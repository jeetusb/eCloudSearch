eCloudSearch 1.0

Requires curl.
=====



=====
Search
=====
	try {
		$ecs = new eCloudSearch();
		$ecs->set_search_endpoint('search-end-point.com');
		$ecs->set_document_endpoint('doc-endpoint.com');



		$results = $ecs->find('example*', array('customer'));
			foreach($results->result() as $document) {
				echo $document->customer;
			}

	} catch (Exception $e) {
		echo $e->getMessage();
	}

====
Advance Search
====

    $ecs = new eCloudSearch();
    $ecs->set_search_endpoint('search-end-point.com');
    $ecs->set_document_endpoint('doc-endpoint.com');


    /**
     * find age between 10 to 20
     */
    $results = $ecs->find('age:10..15', array('age'), null, null, null, true);

    foreach ($results->result() as $document) {
        echo $document->age;
        echo "<br/>";
    }

=====
Adding documents
=====

	try {
		$ecs = new eCloudSearch();
		$ecs->set_search_endpoint('search-end-point.com');
		$ecs->set_document_endpoint('doc-endpoint.com');

		$document = new eCloudSearchDocument();
		$document->set_id( md5(rand()));
		$document->set_version(1);
		$document->set_field('customer', 'example1');
                $document->set_field('age', '10');

		$ecs->add_document($document);

		// You can add multiple documents, and chain commands.
		$document = new eCloudSearchDocument();
		$document->set_id( md5(rand()))->set_version(1)->set_field('customer', 'example2');

		$ecs->add_document($document)->save();


	} catch (Exception $e) {
	echo $e->getMessage();
	}

=====
Deleting Documents
=====

	try {
		$ecs = new eCloudSearch();
		$ecs->set_search_endpoint('search-end-point.com');
		$ecs->set_document_endpoint('doc-endpoint.com');

		// Deletes can be batched.
		$ecs->delete($id, $version);
		$ecs->delete($id2, $version2);
		$ecs->save();

		// Or done one at a time.
		$ecs->delete($id, $version)->save();


	} catch (Exception $e) {
		echo $e->getMessage();
	}

