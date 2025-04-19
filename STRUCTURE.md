# Struktur Proyek

## Backend

```
backend/
├── app/
│   ├── Console/
│   │   └── Kernel.php                     # Kernel konsol
│   ├── Exceptions/
│   │   └── Handler.php                    # Handler exception
│   └── Http/
│       └── Kernel.php                     # Kernel HTTP
├── bootstrap/
│   └── app.php                            # Bootstrap aplikasi
├── public/
│   └── index.php                          # Entry point dan API locations
├── .env                                   # Konfigurasi environment
├── artisan                                # CLI Laravel
└── Dockerfile                             # Konfigurasi Docker untuk backend
```

## Frontend

```
frontend/
├── public/
│   └── vite.svg                           # Favicon aplikasi
├── src/
│   ├── components/
│   │   └── LocationSearch.jsx             # Komponen pencarian lokasi dengan autocomplete
│   ├── App.jsx                            # Komponen utama aplikasi
│   ├── App.css                            # CSS khusus App
│   ├── main.jsx                           # Entry point aplikasi React
│   └── index.css                          # Global styles dan import Tailwind
├── index.html                             # Template HTML
├── package.json                           # Konfigurasi paket NPM
├── postcss.config.js                      # Konfigurasi PostCSS
├── tailwind.config.js                     # Konfigurasi TailwindCSS
├── vite.config.js                         # Konfigurasi Vite
└── Dockerfile                             # Konfigurasi Docker untuk frontend
```

## Konfigurasi Docker

```
docker-compose.yml                         # Konfigurasi Docker Compose
```

## File Tambahan

```
README.md                                  # Dokumentasi proyek
setup.sh                                   # Script setup
``` 