<?php



$getxml = simplexml_load_file("https://www.exmaple.com/file.xml");



    $dom = new DOMDocument();

        $dom->encoding = 'utf-8';

        $dom->xmlVersion = '1.0';

        $dom->formatOutput = true;

        $xml_file_name = 'saved.xml';

        $root = $dom->createElement('channel');

        $item_node = $dom->createElement('item');

    foreach($getxml->channel->item as $item) {

       $dt = new DateTime($item->pubDate);
       $pd = $dt->format('Y/m/d');
       $remove_html_tags = strip_tags(html_entity_decode($item->description));

       
        $title =  $item->title;
        $des = $remove_html_tags;
        $pubDate =  $pd;
        $link = $item->link;

      $item_node = $dom->createElement('item');
      $child_node_title = $dom->createElement('title', $title);

        $item_node->appendChild($child_node_title);

        $child_node_des = $dom->createElement('description', $des);

        $item_node->appendChild($child_node_des);

        $child_node_pubDate = $dom->createElement('pubDate', $pubDate);

        $item_node->appendChild($child_node_pubDate);

        $child_node_link = $dom->createElement('link', $link);

        $item_node->appendChild($child_node_link);

        $root->appendChild($item_node);

        $dom->appendChild($root);


    $dom->save($xml_file_name);
}

?>
