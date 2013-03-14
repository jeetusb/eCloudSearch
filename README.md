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
		if($results->hits->found > 0) {
			foreach($results->hits->hit as $hit) {
				echo $hit->id."\n";
				echo $hit->data->customer[0]."\n";
			}
		}

	} catch (Exception $e) {
		echo $e->getMessage();
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

		$ecs->add_document($document);

		$document = new eCloudSearchDocument();
		$document->set_id( md5(rand()));
		$document->set_version(1);
		$document->set_field('customer', 'example2');

		$ecs->add_document($document);

		$ecs->save();

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
		$ecs->delete($id, $version);

} catch (Exception $e) {
	echo $e->getMessage();
}

