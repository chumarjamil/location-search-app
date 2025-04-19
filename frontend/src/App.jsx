import { useState, useEffect } from 'react'
import LocationSearch from './components/LocationSearch'
import './App.css'

function App() {
  const [selectedLocation, setSelectedLocation] = useState(() => {
    const saved = localStorage.getItem('selectedLocation')
    return saved ? JSON.parse(saved) : null
  })

  // Save selected location to localStorage
  useEffect(() => {
    if (selectedLocation) {
      localStorage.setItem('selectedLocation', JSON.stringify(selectedLocation))
    }
  }, [selectedLocation])

  return (
    <div className="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 flex flex-col items-center justify-center p-4">
      <div className="w-full max-w-md bg-white rounded-xl shadow-xl p-6 border border-gray-100">
        <div className="mb-8 text-center">
          <div className="flex justify-center mb-3">
            <svg xmlns="http://www.w3.org/2000/svg" className="h-10 w-10 text-indigo-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
              <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"></path>
              <circle cx="12" cy="10" r="3"></circle>
            </svg>
          </div>
          <h1 className="text-2xl font-bold text-gray-800 mb-1">
            Location Search
          </h1>
          <p className="text-gray-500 text-sm">Search for sub-districts throughout Indonesia</p>
        </div>
        
        <LocationSearch onLocationSelect={setSelectedLocation} />
        
        {selectedLocation && (
          <div className="mt-6 p-5 bg-indigo-50 rounded-lg border border-indigo-100">
            <h2 className="text-lg font-semibold text-indigo-800 mb-3">Lokasi Terpilih</h2>
            <div className="grid grid-cols-3 gap-3 text-sm">
              <div className="font-medium text-indigo-500">Kecamatan:</div>
              <div className="col-span-2 font-semibold text-gray-800">{selectedLocation.kecamatan}</div>
              
              <div className="font-medium text-indigo-500">Kota:</div>
              <div className="col-span-2 font-semibold text-gray-800">{selectedLocation.kota}</div>
              
              <div className="font-medium text-indigo-500">Provinsi:</div>
              <div className="col-span-2 font-semibold text-gray-800">{selectedLocation.provinsi}</div>
            </div>
          </div>
        )}
      </div>
      <div className="mt-4 text-center text-xs text-gray-500">
        &copy; Developed by Umar Jamil | Powered by React & Laravel
      </div>
    </div>
  )
}

export default App 