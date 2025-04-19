import { useState, useEffect, useRef } from 'react'
import { useDebounce } from 'use-debounce'
import axios from 'axios'

const LocationSearch = ({ onLocationSelect }) => {
  const [searchTerm, setSearchTerm] = useState('')
  const [debouncedSearchTerm] = useDebounce(searchTerm, 300)
  const [locations, setLocations] = useState([])
  const [isLoading, setIsLoading] = useState(false)
  const [isOpen, setIsOpen] = useState(false)
  const dropdownRef = useRef(null)

  // Close dropdown when clicking outside
  useEffect(() => {
    const handleClickOutside = (event) => {
      if (dropdownRef.current && !dropdownRef.current.contains(event.target)) {
        setIsOpen(false)
      }
    }
    
    document.addEventListener('mousedown', handleClickOutside)
    return () => {
      document.removeEventListener('mousedown', handleClickOutside)
    }
  }, [dropdownRef])

  // Fetch locations when debounced search term changes
  useEffect(() => {
    const fetchLocations = async () => {
      if (!debouncedSearchTerm || debouncedSearchTerm.length < 2) {
        setLocations([])
        return
      }

      setIsLoading(true)
      try {
        const response = await axios.get(`http://localhost:8000/api/locations?search=${debouncedSearchTerm}`)
        setLocations(response.data)
        setIsOpen(response.data.length > 0)
      } catch (error) {
        console.error('Error fetching locations:', error)
        setLocations([])
      } finally {
        setIsLoading(false)
      }
    }

    fetchLocations()
  }, [debouncedSearchTerm])

  const handleInputChange = (e) => {
    const value = e.target.value
    setSearchTerm(value)
    if (value.length > 0) {
      setIsOpen(true)
    } else {
      setIsOpen(false)
    }
  }

  const handleLocationSelect = (location) => {
    onLocationSelect(location)
    setSearchTerm('')
    setIsOpen(false)
  }

  // Function to highlight the search term in the text
  const highlightText = (text, highlight) => {
    if (!highlight || highlight.length < 2) return text
    
    const parts = text.split(new RegExp(`(${highlight})`, 'gi'))
    return parts.map((part, i) => 
      part.toLowerCase() === highlight.toLowerCase() 
        ? <span key={i} className="highlight">{part}</span> 
        : part
    )
  }

  return (
    <div className="relative w-full" ref={dropdownRef}>
      <div className="relative">
        <div className="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
          <svg xmlns="http://www.w3.org/2000/svg" className="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
            <path fillRule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clipRule="evenodd" />
          </svg>
        </div>
        <input
          type="text"
          placeholder="Cari provinsi, kota, atau kecamatan..."
          value={searchTerm}
          onChange={handleInputChange}
          className="w-full pl-10 pr-12 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200"
          autoComplete="off"
        />
        {isLoading && (
          <div className="absolute right-3 top-1/2 transform -translate-y-1/2">
            <div className="animate-spin rounded-full h-5 w-5 border-t-2 border-b-2 border-indigo-500"></div>
          </div>
        )}
      </div>

      {isOpen && locations.length > 0 && (
        <div className="absolute z-10 w-full mt-1 bg-white border border-gray-200 rounded-lg shadow-lg max-h-60 overflow-y-auto divide-y divide-gray-100">
          {locations.map((location) => (
            <div
              key={location.id}
              className="px-4 py-3 cursor-pointer hover:bg-indigo-50 transition-colors duration-150"
              onClick={() => handleLocationSelect(location)}
            >
              <div className="font-medium text-gray-900 mb-0.5">
                {highlightText(location.kecamatan, debouncedSearchTerm)}
              </div>
              <div className="text-sm text-gray-600">
                {highlightText(location.kota, debouncedSearchTerm)}, {highlightText(location.provinsi, debouncedSearchTerm)}
              </div>
            </div>
          ))}
        </div>
      )}

      {isOpen && searchTerm.length >= 2 && locations.length === 0 && !isLoading && (
        <div className="absolute z-10 w-full mt-1 bg-white border border-gray-200 rounded-lg shadow-lg p-4 text-center text-gray-500">
          Lokasi "{searchTerm}" tidak ditemukan
        </div>
      )}
    </div>
  )
}

export default LocationSearch 