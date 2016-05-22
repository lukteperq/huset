<?php
//https://developers.facebook.com/docs/graph-api/reference/event/

    // What facebook page to get events from;
    $page = "HusetGjovik";

    // Facebook Open Graph API token
    $token = "EAACmclm94ZAgBACZB3smurkSIZAV31ZAFyNCUMo9ZAQrHDbJgyuPBb0M6yorzPr2XppK5f3AyorNEqKPCiVdlJKHCiyVbkceGObkvyavBPSBHZCOP9IZCN6eLWm1d7HfnCmj0cMo5zvKZCEE9yQHMhG4L9jtx5AjN2sZD";

    $url = "{$page}/events";

    function request($url, $token){
        $urlToken = "https://graph.facebook.com/v2.6/" . $url . $token;
        $response = json_decode(file_get_contents($urlToken));
        return $response;
    }

    $feilds = [
        'ticket_uri',
        'cover',
        'name',
        'start_time',
        'end_time',
        'description',
    ];
    $feilds = implode(',', $feilds);

    $token_url = "?fields={$feilds}&access_token={$token}";

    $data = request($url, $token_url)->data;
    foreach($data as $key => $item){
        //Post data
        if(get_post_status($item->id) !== false){

            // linebreak (enter) * 3 becomes a "Read More" break
            $description = preg_replace("/\\n\\n\\n/uimx", "<!–more–>", $item->description);

            //Insert new post
            //https://developer.wordpress.org/reference/functions/wp_insert_post/
            wp_insert_post([
                'id' => $item->id,
                'post_title' => $item->name,
                'post_content' => $description,
                'comment_status' => 'closed', // open, remove comments
            ]);

            //Post Tags
            wp_set_post_tags($item->id, [
                'event',
                'huset',
            ]);

            // Post category, Array of category ID's
            wp_set_post_categories($item->id, [
                1,
            ]);

            // Upload and attach the event cover photo to post
            // https://developer.wordpress.org/reference/functions/media_sideload_image/
            media_sideload_image($item->cover->source, $item->id, $item->name);
        }
    }
