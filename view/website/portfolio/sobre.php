



<link rel="stylesheet" type="text/css" href="style/css/website/sobre.css">


<div class="col s12 sobre sector" data-scrolltop="sobre">
    <span class="title"> UM POUCO SOBRE MIM... </span>

    	<?php
    		$video_sobre = false;

    		if (!empty($config_array['link_video_sobre'])) {
                $iframe_url = 'https://www.youtube.com/embed/' . $config_array['link_video_sobre'];
    			$video_sobre = true;
    	?>
    			<div class="col l6 m12 s12">
			        <iframe src="<?php echo $iframe_url; ?>" class="video"></iframe>
			    </div>
    	<?php
    		}
    	?>

    <div class="col <?php echo $video_sobre ? "l6 m12 s12" : "l12 m12 s12"; ?>">
        <span class="subtitle"> <b> <?php echo $config_array['nome_sobre']; ?> </b> </span>

        <span class="subtitle"> <?php echo $config_array['texto_sobre']; ?> </span>
    </div>
</div>
