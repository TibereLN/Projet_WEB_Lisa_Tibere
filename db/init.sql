-- Activer PostGIS
CREATE EXTENSION IF NOT EXISTS postgis;

-- Créer une table points avec un champ géométrie
CREATE TABLE points (
    id SERIAL PRIMARY KEY,
    name TEXT,
    geom geometry(Point, 4326)
);

-- Insérer des données exemples
INSERT INTO pointsTest (name, geom) VALUES
('Montmartre', ST_SetSRID(ST_MakePoint(2.3401192860050712, 48.88629639918976), 4326)),
('Chateau de Champs', ST_SetSRID(ST_MakePoint(2.6038392671734214, 48.855380568480705), 4326)),
('Bastille', ST_SetSRID(ST_MakePoint(2.369255597837038, 48.853072871652714), 4326));