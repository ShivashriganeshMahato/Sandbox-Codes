<?php
/**
 * Fetch all branches that the selected repository has
 *
 * @author Shivashriganesh Mahato
 */

include 'init.php';

$owner = $_POST['owner'];
$repo = $_POST['repo'];

$branches = array();
$data = $client->repos->listBranches($owner, $repo);

if (is_array($data)) {
    foreach ($data as &$branch) {
        $branches[] = $branch->getName();
    }
}

header('Content-Type: application/json');
echo json_encode($branches);