<div class="container">
<h2><?php echo $title; ?></h2>
<div class="panel panel-default">
    <div class="panel-heading"><h4><?php echo $lang_information; ?></h4></div>
    <div class="panel-body">
        <p>
		<?php
			$xml = simplexml_load_file(base_url() . "/media/xml/contact.xml");
			echo $xml->email . '<br />';
			echo $xml->phone . '<br />';
			echo $xml->team . '<br />';
		?>
		</p>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading"><h4><?php echo $lang_map; ?></h4></div>
    <div class="panel-body">
        <?php echo $map['js'];?>
        <?php echo $map['html'];?>

    </div>
</div>
    </div>