<x-filament-panels::page>
    <div id="map" style="height: 500px;"></div>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css"/>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var map = L.map('map').setView([-6.200000, 106.816666], 6);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 18,
            }).addTo(map);

            let locations = @json($this->locations);

            locations.forEach(loc => {
                if (loc.latitude && loc.longitude) {
                    L.marker([loc.latitude, loc.longitude])
                        .addTo(map)
                        .bindPopup(
                            `<b>Armada:</b> ${loc.fleet.fleet_number}<br>
                             <b>Koordinat:</b> ${loc.latitude}, ${loc.longitude}<br>
                             <b>Update:</b> ${loc.updated_at}`
                        );
                }
            });
        });
    </script>
</x-filament-panels::page>
