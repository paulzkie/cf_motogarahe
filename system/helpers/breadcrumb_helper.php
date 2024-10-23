<?php
if(!function_exists('generatedBreadcrumb')){
    function generateBreadcrumb(){
        $ci=&get_instance();
        $i=1;
        $uri = $ci->uri->segment($i);
        $link='
        <ol class="breadcrumb">';

        while($uri != ''){
        $prep_link = '';
        for($j=1; $j<=$i; $j++){
        $prep_link.=$ci->uri->segment($j).'/';
        }

        if($ci->uri->segment($i+1)== ''){
            $link.='<li class="active"><a href="'.site_url($prep_link).'">';
            $link.=$ci->uri->segment($i).'</a></li>';
        }else{
            $link.='<li><a href="'.site_url($prep_link).'">';
            $link.=$ci->uri->segment($i).'</a><span class="divider"></span></li>';
        }

        $i++;
        $uri = $ci->uri->segment($i);
        }
        $link .='</ol>';
        return $link;
    }
}