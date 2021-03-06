<?php

require_once(__DIR__ . '/../GitHubClient.php');
require_once(__DIR__ . '/../GitHubService.php');
require_once(__DIR__ . '/../objects/GitHubRef.php');
	

class GitHubGitRefs extends GitHubService
{

	/**
	 * Get a Reference
	 * 
	 * @return GitHubRef
	 */
	public function getReference($owner, $repo, $ref)
	{
		$data = array();
		
		return $this->client->request("/repos/$owner/$repo/git/refs/$ref", 'GET', $data, 200, 'GitHubRef');
	}
	
	/**
	 * Get all References
	 * 
	 */
	public function getAllReferences()
	{
		$data = array();
		
		return $this->client->request("/repos/octocat/Hello-World/git/refs/tags/v1.0", 'DELETE', $data, 204, '');
	}

	public function addReference($owner, $repo, $ref, $sha) {
	    $data = array();
	    $data['ref'] = $ref;
	    $data['sha'] = $sha;

	    return $this->client->request("/repos/$owner/$repo/git/refs", 'POST', $data, 202, '');
    }

	public function deleteReference($owner, $repo, $ref) {
	    $data = array();

	    return $this->client->request("/repos/$owner/$repo/git/refs/$ref", 'DELETE', $data, 204, '');
    }

	public function updateReference($owner, $repo, $ref, $sha) {
	    $data = array();
	    $data['sha'] = $sha;

	    return $this->client->request("/repos/$owner/$repo/git/refs/$ref", 'PATCH', $data, 204, '');
    }
}

