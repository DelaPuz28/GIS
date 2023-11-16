<?php
include 'db.php';
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

$type = $request->typeofgeom;
$name = $request->nameofgeom;
$stringgeom = $request->stringofgeom;
$srid = '3857';

//$type = $_POST['typeofgeom'];
//$name = $_POST['nameofgeom'];
//$stringgeom = $_POST['stringofgeom'];
//$srid = '3857';
//$add_query = "INSERT INTO public.\"FeatureDrawn\" (type, name, geom) VALUES ('$type', '$name', ST_GeomFromGeoJSON('$stringgeom'))";

$add_query = "INSERT INTO public.\"FeatureDrawn\" (type, name, geom) VALUES ('$type', '$name', ST_SetSRID(ST_GeomFromGeoJSON('$stringgeom'), $srid))";

$query = pg_query($dbconn, $add_query);
if ($query) {
    echo json_encode(array("statusCode" => 200));
} else {
    echo json_encode(array("statusCode" => 201));
}
?>