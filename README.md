AIzaSyA7adNXOqV_BAsGi_AihmCGw1cO0RCeoTc

Google Maps Geocoding API

CREATE TABLE project ( id INT AUTO_INCREMENT PRIMARY KEY, latitude DECIMAL(10, 8) NOT NULL, longitude DECIMAL(11, 8) NOT NULL, project_number VARCHAR(20) NOT NULL, created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ); city data CREATE TABLE city_data ( id INT AUTO_INCREMENT PRIMARY KEY, country VARCHAR(255), region VARCHAR(255), city VARCHAR(255), latitude DECIMAL(10, 7), longitude DECIMAL(10, 7), currency_code VARCHAR(10), currency_name VARCHAR(255), currency_symbol VARCHAR(10), sunrise TIME, sunset TIME, time_zone VARCHAR(20), distance_km DECIMAL(10, 4) ); plant api: https://plant.id/api/v3 SaubAg4dkmK0H3COath8gthvlaIbMrxFo3Vdca2vJO581pe863 Trefle API: access tocken:

tBYGkqmhMnsxXzVjMvrlrg5QKaxZnv80WH5B0OANzlc

Trefle API: Trefle provides a RESTful API for plant data. It offers extensive plant information, including taxonomy, distribution, growth, and cultivation details. You can search for plants by name, family, genus, and other criteria. Trefle API offers both free and paid plans.

Website: Trefle API

The Plant Encyclopedia API: This API provides comprehensive information about plants, including their taxonomy, growth habits, care requirements, and more. It offers a RESTful interface for accessing plant data.

Website: The Plant Encyclopedia API

Plant.id API: Plant.id provides an API for plant identification using machine learning. You can upload images of plants, and the API will return the most likely species along with information about it.

Website: Plant.id API

OpenFarm API: OpenFarm is an open-source database for farming and gardening knowledge. It provides an API to access information about various plants, including growing conditions, planting guides, and more.

Website: OpenFarm API

USDA PLANTS Database: The USDA PLANTS Database offers an extensive collection of information about plants native to the United States. While it doesn't provide a traditional API, you can download the dataset in various formats, including JSON.

Website: USDA PLANTS Database

"city": [ { "name": "Baridhara", "scientific_name": "Quercus", "family": "Fagaceae", "soil_type": "Loam", "water_level": "Moderate", "total_area": "Large", "soil_ph": "6.0-7.5", "average_height_m": 25, "average_diameter_cm": 100, "lifespan_years": 200, "shade_tolerance": "Intermediate", "wildlife_benefits": ["Acorns for birds and mammals", "Provides habitat for insects"], "native_region": "Northern Hemisphere", "image_url": "https://example.com/oak.jpg" }
