<?php
include 'db.php';


// Set up your database connection
//$databaseConfig = [
  // 'host' => 'localhost',
   // 'user' => 'postgres',
   // 'password' => 'postgres',
   //'dbname' => 'GISMAP',
//];


//$databaseConfig = [
  //  'host' => 'db.buycuwzzxzvvrcibgynq.supabase.co',
  //   'user' => 'postgres',
   //  'password' => '0909Try_only0909',
   // 'dbname' => 'postgres',
// ];

$databaseConfig = [
    'POSTGRES_URL' => 'postgres://default:NQsRLIHiYE41@ep-broken-meadow-37339063-pooler.us-east-1.postgres.vercel-storage.com:5432/verceldb',
    'POSTGRES_PRISMA_URL' => 'postgres://default:NQsRLIHiYE41@ep-broken-meadow-37339063-pooler.us-east-1.postgres.vercel-storage.com:5432/verceldb?pgbouncer=true&connect_timeout=15',
    'POSTGRES_URL_NON_POOLING'=> 'postgres://default:NQsRLIHiYE41@ep-broken-meadow-37339063.us-east-1.postgres.vercel-storage.com:5432/verceldb',
    'POSTGRES_HOST' => 'ep-broken-meadow-37339063-pooler.us-east-1.postgres.vercel-storage.com',
    'POSTGRES_USER' => 'default',
    'POSTGRES_PASSWORD' => 'NQsRLIHiYE41',
    'POSTGRES_DATABASE' => 'verceldb',
 ];



$pdo = new PDO(
    "pgsql:host={$databaseConfig['host']};dbname={$databaseConfig['dbname']}",
    $databaseConfig['user'],
    $databaseConfig['password']
);

// Handle CORS (Cross-Origin Resource Sharing) if needed
header('Access-Control-Allow-Origin: https://gis-eta.vercel.app');
//header('Access-Control-Allow-Origin: http://localhost:8080'); // Adjust to match your actual origin
header('Access-Control-Allow-Methods: GET'); // Adjust as needed
//header('Access-Control-Allow-Headers: Content-Type'); // Adjust as needed


// Define the API endpoint
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        $stmt = $pdo->query('SELECT type, name, ST_AsGeoJSON(geom) as geometry FROM "FeatureDrawn"');
        $features = [];
    
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $geometry = json_decode($row['geometry']);
            $feature = [
                'type' => 'Feature',
                'geometry' => $geometry,
                'properties' => [
                    'type' => $row['type'],
                    'name' => $row['name'],
                ],
            ];
            $features[] = $feature;
        }
    
        $geoJsonResponse = [
            'type' => 'FeatureCollection',
            'features' => $features,
        ];
        header('Content-Type: application/json');
        echo json_encode($geoJsonResponse);
    } catch (PDOException $e) {
        error_log('Error fetching data: ' . $e->getMessage());
        http_response_code(500);
        echo json_encode(['error' => 'Internal Server Error']);
    }
} else {
    http_response_code(405); // Method Not Allowed
    echo json_encode(['error' => 'Method Not Allowed']);
}
