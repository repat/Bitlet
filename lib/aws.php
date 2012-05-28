<?
	require_once 'aws_lib/sdk.class.php';

	const BUCKET = 'bitlet_files';

	// upload a file with fid currently stored in $location
	function AwsUpload($fid, $location)
	{
		// Instantiate the AmazonS3 class
		$s3 = new AmazonS3();

		// get our bucket and file details
		$name = strval($fid);

		// Prepare to upload the file to our new S3 bucket. Add this
		// request to a queue that we won't execute quite yet.
		$file_upload_response = $s3->create_object(BUCKET, $name, array(	// we use the fid as file name
			'fileUpload' => $location
		));

		// make sure response comes back OK
		if ($file_upload_response->isOK()) {
			return true;
		} else {
			return false;
		}
	}

	// get url of file based on fid
	function AwsGetUrl($fid)
	{
		// Instantiate the AmazonS3 class
		$s3 = new AmazonS3();

		$name = strval($fid);
		/* Display a URL for each of the files we uploaded. Since uploads default to
		   private (you can choose to override this setting when uploading), we'll
		   pre-authenticate the file URL for the next 5 minutes. */
		$url = $s3->get_object_url(BUCKET, $name, '5 minutes');
		$size = $s3->get_object_filesize(BUCKET, $name);
		return array($url, $size);
	}
?>
