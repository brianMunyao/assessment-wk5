<?php get_header() ?>

<h1>Register</h1>
<?php
if (have_posts()) {
    while (have_posts()) : the_post();
        the_content();
    endwhile;
}

// echo do_shortcode("[input_code placeholder='Enter your fullname' name='fullname']");

$res = wp_remote_post(
    'http://localhost/assessment-wk5/wp-json/jwt-auth/v1/token',
    [
        'body' => [
            'username' => 'admin',
            'password' => 'admin'
        ]
    ]
);

$token = json_decode($res['body'], true)['token'];



$foods_res = wp_remote_get(
    'http://localhost/assessment-wk5/wp-json/myfoods/v1/foods?meta_key=_edit_last&meta_value=1',
    [
        'headers'     => [
            'Authorization' => 'Bearer ' . $token,
        ],
    ]
);

$foods = json_decode($foods_res['body']);

foreach ($foods as $f) {
?>
    <p><?php // var_dump($f) 
        ?></p>
    <p><?php echo $f->title ?></p>
<?php
}

?>