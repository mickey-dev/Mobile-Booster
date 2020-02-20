<?php
/*
 * Contact form is generating here...
 */

function contact_form_shortcode($atts , $content=""){
    $atts = shortcode_atts([
        'class' => '',
        'title' => '',
        'mailto' => get_bloginfo('admin_email'),
    ],$atts);

    $atts['class'] = ($atts['class']) ? ' '.$atts['class'] : '' ;

    $html = '<div class="contact-form'.$atts['class'].'">';
        if(!empty($atts['title'])) $html .= '<h2>'.$atts['title'].'</h2>';
        $html .= '<p>'.$content.'</p>';
        $html .= '<form action="#" method="post" id="contact_form">';
            $html .= '<div class="row">';
                $html .= '<div class="col-sm-12 col-md-6">';
                    $html .= '<label for="first">Firts Name</label>';
                    $html .= '<input type="text" id="first" name="first_name" class="form-control" placeholder="First">';
                $html .= '</div>';
                $html .= '<div class="col-sm-12 col-md-6">';
                    $html .= '<label for="last">Last Name</label>';
                    $html .= '<input type="text" id="last" name="last_name" class="form-control" placeholder="Last">';
                $html .= '</div>';
            $html .= '</div>';
            $html .= '<div class="row">';
                $html .= '<div class="col-sm-12">';
                    $html .= '<label for="email">Email</label>';
                    $html .= '<input type="email" id="email" name="email" class="form-control" placeholder="Email">';
                $html .= '</div>';
            $html .= '</div>';
            $html .= '<div class="row">';
                $html .= '<div class="col-sm-12">';
                    $html .= '<label for="question">Enter your question</label>';
                    $html .= '<textarea class="form-control" name="question" id="question" rows="3"></textarea>';
                    $html .= '<input type="hidden" name="mailto" value="'.$atts['mailto'].'">';
                $html .= '</div>';
            $html .= '</div>';
            $html .= '<div class="row">';
                $html .= '<div class="col-sm-12">';
                    $html .= '<input type="submit" name="Submit" class="btn btn-default" value="Submit">';
                $html .= '</div>';
            $html .= '</div>';
        $html .= '</form>';
    $html .= '</div>';
    return $html;
}

add_shortcode( 'contact_form' , 'contact_form_shortcode' );
add_action( 'wp_ajax_mb_contact_form', 'contact_form_action' );

function contact_form_action(){
    $response = array(
        'response' => 'failure',
        'message' => 'Something went wrong',
    );

    if(!isset($_POST['fields']) || empty($_POST['fields'])){
        $response['message'] = 'Empty Request';
        die(json_encode($response));
    };

    $fields = json_decode( stripslashes( $_POST['fields'] ) );

    $mailto = get_bloginfo('admin_email');
    if(!isset($fields->mailto) || empty($fields->mailto) ){
        $fields->mailto = $mailto;
    }

    /*     First Name Validate     */

    if(!isset($fields->first_name) || empty($fields->first_name)){
        $response['message'] = 'The First Name field is required!';
        die(json_encode($response));
    } elseif(!ctype_alpha($fields->first_name)){
        $response['message'] = 'The First Name field must contain only alphabetic characters!';
        die(json_encode($response));
    }

    /*     Last Name Validate     */

    if(!isset($fields->last_name) || empty($fields->last_name)){
        $response['message'] = 'The Last Name field is required!';
        die(json_encode($response));
    } elseif(!ctype_alpha($fields->last_name)){
        $response['message'] = 'The Last Name field must contain only alphabetic characters!';
        die(json_encode($response));
    }

    /*     Email Validate     */

    if(!isset($fields->email) || empty($fields->email)){
        $response['message'] = 'The Email field is required!';
        die(json_encode($response));
    } elseif( ! filter_var( $fields->email , FILTER_VALIDATE_EMAIL ) ){
        $response['message'] = 'Invalid Email!';
        die(json_encode($response));
    }

    /*     Email Validate     */

    if(!isset($fields->question) || empty($fields->question)){
        $response['message'] = 'Empty Question. Feel free to ask!';
        die(json_encode($response));
    }
    $adminSubject = 'Question Form Submitted';
    $userSubject = 'You Sent an email';
    ob_start();

    SmartBoosters::get_template('email',[
        'title'         => $adminSubject,
        'footer_text'   => 'If you don\'t know what is this about, please email to <a href="mailto:'. get_bloginfo('admin_email') .'">'. get_bloginfo('admin_email') .'</a>',
        'data'          => [
            'From'      => $fields->first_name.' '.$fields->last_name,
            'Email'     => $fields->email,
            'Question'  => $fields->question,
        ]
    ]);

    $adminmessage = ob_get_contents();
    ob_clean();

    ob_start();
    SmartBoosters::get_template('email',[
        'title'         => $userSubject,
        'footer_text'   => 'If you don\'t know what is this about, please email to <a href="mailto:'. get_bloginfo('admin_email') .'">'. get_bloginfo('admin_email') .'</a>',
        'data'          => [
            'From'      => $fields->first_name.' '.$fields->last_name,
            'Email'     => $fields->email,
            'Question'  => $fields->question,
        ]
    ]);
    $usermessage = ob_get_contents();
    ob_clean();

    $headers = "Content-Type: text/html; charset=UTF-8\r\n";
    $headers .= "From: Mobile Phone Signal Boosters <".$fields->mailto.">\r\n";

    if(@wp_mail( $fields->mailto, $adminSubject, $adminmessage , $headers ) && @wp_mail( $fields->email, $userSubject, $adminmessage , $headers )){
        $response['response'] = 'success';
        $response['message'] = 'Form Submitted';
    } else{
        $response['message'] = 'Can not send message to: '.$fields->email;
    }

    die( json_encode($response));
}