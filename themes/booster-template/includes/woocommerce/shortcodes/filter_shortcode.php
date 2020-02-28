<?php

function filter_shortcode($atts,$content=null)
{
    $atts = shortcode_atts([
        'title' => false
    ], $atts);
    $id = rand();
    $html = '<div class="filter" id=""><div class="container">';

    $html .= $atts['title'] ? "<h2 class='title'>".$atts['title']."</h2>":'';
    $html .= "<p id='filter-form' class='desc'>We offer innovative mobile signal solutions in form of the best mobile signal boosters to ensure that you are always connected. Our mobile signal boosters will serve you anywhere in the UK. At MobileBoster, we understand your situation and have a solution to your problem.</p>";
    $html .= '<form action="filter" method="post" id="filter-mobile">
  <!-- One "tab" for each step in the form: -->
  <div class="tab row">';
    $coverages = get_terms('coverage', array(
        'hide_empty' => false,
    ));

    if (!empty($coverages)) {
        $html .= '<div class="col-md-4 back-img"></div>';
        $html .= '<div class="filter-step coverages col-md-8">';

        $html .= '<div class="step-title"><div class="step-number">Step 1</div><div class="step-description">Select Your Range</div></div>';

        $html .= '<div class="step-body">';
        $html .= '<div class="trigger">';
        $html .= '<ul>';

        $html .= '
                    <li id="2">
                      <div class="garis"><div></div></div>
                      <div class="bulet"></div>
                      <div class="text">300 <span class="text-sqm">SQM</span></div>
                    </li>
                  ';

        $html .= '  <li id="3">
                      <div class="garis"><div></div></div>
                      
                      <div class="bulet"></div>
                      <div class="text">500 <span class="text-sqm">SQM</span></div>
                    </li>';

        $html .= '<li id="4">
                      <div class="garis"><div></div></div>
                      
                     <div class="bulet"></div>
                      <div class="text">1000 <span class="text-sqm">SQM</span></div>
                    </li>';

        $html .= '<li id="5">
                      <div class="garis"><div></div></div>
                      
                      <div class="bulet"></div>
                      
                     <div class="text">5000 <span class="text-sqm">SQM</span></div>
                    </li>';
        $html .= '</ul>';
        $html .= '</div>';
        $i = 1;
        foreach ($coverages as $coverage) {
            // title="'.get_term_meta($coverage->term_id, 'additional_info',true).'"
            $html .= '<div id="range'. $i++ .'" class="choice coverage">';
            $html .= '<label for"filter-coverage-'.$coverage->slug.'">';
            $html .= '<input name="data[coverage][]" id="filter-coverage-'.$coverage->slug.'" type="radio" value="'.$coverage->term_id.'">';
            $html .= '<span class="choice-details">';
            $html .= '<span class="choice-name">';
            $html .= $coverage->description;
            $html .= '</span>';
            $html .= '</span>';
            $html .= '</label>';
            $html .= '</div>';
        }

        $html .= '</div>';
        $html .= '</div>';
    }

    $providers = get_terms('provider', array(
        'hide_empty' => false,
    ));


    $html .= '</div>
        <div class="tab">';
    if (!empty($providers)) {
        $html .= '<div class="filter-step providers">';

        //$html .= '<div class="step-title"><div class="step-number">2</div><div class="step-description">Select your voice/data carriers</div></div>';
        $html .= '<div class="step-title"><div class="step-number">Step 2</div><div class="step-description">Select Your Providers</div></div>';

        $html .= '<div class="step-body hertz-wrapper">';

        $count = 0;
        foreach ($providers as $provider) {
            if ($count === 0){
                $html .= '<div class="hertz-item hertz-900">
                            <div class="choice-wrapper">';
            } elseif ($count === 2){
                $html .= '</div>
                          <div class="hertz-txt"><h3>900<br><span>Mhz</span></h3></div>                    
                        </div>
                        <div class="hertz-item hertz-1800">
                            <div class="choice-wrapper">';
            } elseif ($count === 6){
                $html .= '</div>
                          <div class="hertz-txt"><h3>1800<br><span>Mhz</span></h3></div>                    
                        </div>
                        <div class="hertz-item hertz-2100">
                            <div class="choice-wrapper">';
            }
            $html .= '<div class="choice provider" title="'.get_term_meta($provider->term_id, 'additional_info',true).'">';
            $html .= '<label for"filter-provider-'.$provider->slug.'">';
            $html .= '<input name="data[provider][]" id="filter-provider-'.$provider->slug.'" type="checkbox" value="'.$provider->term_id.'">';
            $html .= '<span class="choice-details">';
            $icon_class = get_term_meta($provider->term_id, 'icon',true);
            if($icon_class){
                $html .= '<span class="choice-icon">';
                $html .= '<i class="'.$icon_class.'"></i>';
                $html .= '<span class="checkbox"></span>';
                $html .= '</span>';
            }
            $html .= '</span>';
            $html .= '</label>';
            $html .= '</div>';
            if ($count === 7) {
                $html .= '</div>';
                $html .= '<div class="hertz-txt"><h3>2100<br><span>Mhz</span></h3></div>                    
                        </div>';
            }
            $count++;
        }
        $html .= '</div>';
        $html .= '</div>';
    }
    $html .= '</div>
  <div class="step-buts">
    <div class="step1-buttons">
        <div class="col-md-4"></div>
        <div class="col-md-8">
            <button type="button" id="nextBtn" onclick="nextPrev(1)">NEXT STEP</button>
        </div>  
    </div>
    <div style="step2-buttons">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">PREVIOUS</button>
      <button type="submit" id="frm_submit_Btn" class="">REVEAL YOUR BOOSTER</button>
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:0px;">
    <span class="step"></span>
    <span class="step"></span>
  </div>
</form>';
    $html .= '</div></div>';
    return $html;
}

add_shortcode( 'filter' , 'filter_shortcode' );
