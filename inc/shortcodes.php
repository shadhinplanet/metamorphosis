<?php function comments_shortcode($atts, $content) {

    $q=shortcode_atts(array('title'=> 'Comments or Questions',
            'sub'=> 'What did you think of todays lesson? <br> Please leave a comment below.',
        ), $atts);

    ob_start();


    ?><style>
    .colored_box {
        border: 1px solid #343e69;
        padding: 15px;
        display: flex;
        justify-content: space-between;
        border-radius: 7px;
        position: relative;
        z-index: 1;
    }

    .colored_box.comments {
        border: 1px solid #1ba13d;
        padding: 35px 0;
        margin-bottom: 30px;
        margin-top: 30px;
    }

    .colored_box_icon {
        flex: 15%;
        text-align: center;
        align-self: ;
    }

    .colored_box_icon i {
        font-size: 50px;
        color: #1ba13d;
    }

    .colored_box_content {
        flex: 85%;
    }

    .colored_box_content h2 {
        font-size: 25px;
        color: #1ba13d;
        margin: 0;
    }

    .colored_box_content h3 {
        font-size: 16px;
        color: #555;
    }

    .colored_box::after {
        background: rgba(0, 0, 0, 0) url("<?php echo get_template_directory_uri(); ?>/assets/img/down-arrow.png") no-repeat scroll 0 0;
        bottom: -20px;
        content: "";
        height: 22px;
        position: absolute;
        width: 25px;
        left: 10%;
    }

    @media only screen and (max-width: 767px) {
        .colored_box.comments {
            padding: 15px 0;
        }

        .colored_box_icon i {
            font-size: 35px;
        }

        .colored_box_content {
            flex: 75%;
        }

        .phosis_class_content h2 {
            font-size: 20px;
        }

        .colored_box_content h3 {
            font-size: 13px;
        }
    }
</style>
<div class="colored_box comments">
    <div class="colored_box_icon"><i class="fa fa-question-circle"></i></div>
    <div class="colored_box_content">
        <h2><?php echo $q['title'];
    ?></h2>
        <h3><?php echo $q['sub'];
    ?></h3>
    </div>
</div>
<div class="comments">
    <div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="100%" data-numposts="3"></div>
</div><?php return ob_get_clean();
}

add_shortcode('comments', 'comments_shortcode');


// Video Shortcode

function youtube_shortcode($atts, $content) {

    $q=shortcode_atts(array('url'=> 'https://www.youtube.com/watch?v=zpOULjyy-n8',
        ), $atts);

    $video_id=explode("?v=", $q['url']);
    $video_id=$video_id[1];

    ob_start();
    ?><div class="phosis_class_video">
    <div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item"
            src="https://www.youtube.com/embed/<?php echo $video_id;?>?autoplay=0&fs=1&iv_load_policy=1&showinfo=0&loop=1&rel=0&cc_load_policy=0&start=0&end=0"></iframe>
    </div>
</div><?php return ob_get_clean();
}

add_shortcode('youtube', 'youtube_shortcode');




// Plans

function phosis_trial_class_activation() {
    $user_id=get_current_user_id();
$plans=wc_memberships_get_membership_plans(); 
sort($plans);
$user_memberships = wc_memberships_get_user_active_memberships($user_id);
$trial_membership = wc_memberships_is_user_active_member($user_id, 'trial-subscription');
$monthly_membership = wc_memberships_is_user_active_member($user_id, 'monthly-subscription');
$yearly_membership = wc_memberships_is_user_active_member($user_id, 'yearly-subscription');
$lock = false;
// echo '<pre>';
// var_dump(count($user_memberships));
//     foreach($user_memberships as $member){
//     var_dump($member->plan->slug);
//     }
// echo '</pre>';


if($yearly_membership){
    echo '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
   <strong>Attention!</strong> You already have "Yearly Subscription"!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
$lock = true;
}
if($monthly_membership){
    echo '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
   <strong>Attention!</strong> You already have "Monthly Subscription"!
  
</div>';
$lock = true;
}

if(!$trial_membership){
    echo '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
   <strong>Attention!</strong> You need "Trail Subscription" to select a class!
  
</div>';
$lock = true;
}else{
    if(count($user_memberships) == 2){
        echo '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
        <strong>Attention!</strong> You have already selected a class!
        </div><div class="text-center phosis_btn"><a href="'.home_url( 'dashboard/members-area/' ).'">My Dashboard</a></div>';
        die();
    }
}

    ob_start();

    if(!$lock):
    ?><form id="subscribe-trial-class"  method="post" >

<ul class="nav justify-content-center nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link active" id="pills-module-1-tab" data-toggle="pill" href="#pills-module-1" role="tab" aria-controls="pills-module-1" aria-selected="true">Module 1</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="pills-module-2-tab" data-toggle="pill" href="#pills-module-2" role="tab" aria-controls="pills-module-2" aria-selected="false">Module 2</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="pills-module-3-tab" data-toggle="pill" href="#pills-module-3" role="tab" aria-controls="pills-module-3" aria-selected="false">Module 3</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="pills-module-4-tab" data-toggle="pill" href="#pills-module-4" role="tab" aria-controls="pills-module-4" aria-selected="false">Module 4</a>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-module-1" role="tabpanel" aria-labelledby="pills-module-1-tab">
        <?php echo do_shortcode( '[trail_class tax="Module 1"]' )?>
    </div>
    <!-- Module 1 end -->
      <div class="tab-pane fade" id="pills-module-2" role="tabpanel" aria-labelledby="pills-module-2-tab">
           <?php echo do_shortcode( '[trail_class tax="Module 2"]' )?>
      </div>
      <!-- Module 2 end -->
      <div class="tab-pane fade" id="pills-module-3" role="tabpanel" aria-labelledby="pills-module-3-tab">
            <?php echo do_shortcode( '[trail_class tax="Module 3"]' )?>
      </div>
      <!-- Module 3 end -->
      <div class="tab-pane fade" id="pills-module-4" role="tabpanel" aria-labelledby="pills-module-4-tab">
            <?php echo do_shortcode( '[trail_class tax="Module 4"]' )?>
      </div>
      <!-- Module 4 end -->
    </div>
  </div>
</div>



   
    <!-- <div class="form-group row plan-subscrip-btn">
        <div class="col-12 text-center">
            <button type='submit' class="btn btn-primary" name="submit">View Class</button>
        </div>
    </div> -->
</form>
<?php endif;  return ob_get_clean();
}

add_shortcode('trial_class', 'phosis_trial_class_activation');

function phosis_trial_class_lists($atts){
        extract( shortcode_atts( array(
                'tax' => 'Module 1',
            ), $atts) );
    $user_id=get_current_user_id();
$plans=wc_memberships_get_membership_plans(); 
sort($plans);
$user_memberships = wc_memberships_get_user_active_memberships($user_id);
$trial_membership = wc_memberships_is_user_active_member($user_id, 'trial-subscription');
$monthly_membership = wc_memberships_is_user_active_member($user_id, 'monthly-subscription');
$yearly_membership = wc_memberships_is_user_active_member($user_id, 'yearly-subscription');

    $list = '<div class="plan-list-radio">';
    foreach($plans as $plan){
        if($plan->slug=='monthly-subscription'|| $plan->slug=='yearly-subscription' || $plan->slug=='trial-subscription' ){

        }else{
            $name = $plan->name;
            $pattern = "/[-\:]/";
            $name = preg_split($pattern, $name);
            if($name[0]== $tax){
                $list .= '<label class="class_item" for="'.esc_attr($plan->slug).'">';
                $list .= '<input type="radio" class="form-check-input" id="'.esc_attr($plan->slug).'" name="trial-selection" value="'.esc_attr($plan->id).' '.esc_attr($plan->slug).'"><span class="checkmark"></span><span class="current_item"></span>';
                $list .= '<div class="single_plan">
                                <div class="plan_img"><h3>'.esc_attr($name[0]).'</h3></div>
                                <div class="plan_desc">
                                    <h1>'.esc_attr($name[1]).'</h1>
                                    <h2>'.esc_attr($name[2]).'</h2>
                                    <h4>Click to select</h4>
                                    <button type="submit" class="view_class_btn" name="submit">View Class</button>
                                </div>
                            </div>';
                $list .= '</label>';
            }
        }
    }

    $list .= '</div>';
    return $list;

}
add_shortcode( 'trail_class', 'phosis_trial_class_lists' );




function phosis_all_class_list($atts){
    extract( shortcode_atts( array(
        'count' => -1,
    ), $atts) );
    if(is_user_logged_in(  )){
        $list = '<div class="phosis_all_class_tabs"> <nav>
            <div class="nav justify-content-center nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-link active" id="nav-module-1-tab" data-toggle="tab" href="#nav-module-1" role="tab" aria-controls="nav-module-1" aria-selected="true">Module 1</a>
                <a class="nav-link" id="nav-module-2-tab" data-toggle="tab" href="#nav-module-2" role="tab" aria-controls="nav-module-2" aria-selected="false">Module 2</a>
                <a class="nav-link" id="nav-module-3-tab" data-toggle="tab" href="#nav-module-3" role="tab" aria-controls="nav-module-3" aria-selected="false">Module 3</a>
                <a class="nav-link" id="nav-module-4-tab" data-toggle="tab" href="#nav-module-4" role="tab" aria-controls="nav-module-4" aria-selected="false">Module 4</a>
            </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-module-1" role="tabpanel" aria-labelledby="nav-module-1-tab">
                '.do_shortcode( '[snow_classes tax="module-1"]' ).'
            </div>
            <div class="tab-pane fade" id="nav-module-2" role="tabpanel" aria-labelledby="nav-module-2-tab">
        '.do_shortcode( '[snow_classes tax="module-2"]' ).'
            </div>
            <div class="tab-pane fade" id="nav-module-3" role="tabpanel" aria-labelledby="nav-module-3-tab">
                '.do_shortcode( '[snow_classes tax="module-3"]' ).'
            </div>
            <div class="tab-pane fade" id="nav-module-4" role="tabpanel" aria-labelledby="nav-module-4-tab">
            '.do_shortcode( '[snow_classes tax="module-4"]' ).'
            </div>
            </div>
            </div>';
    }else{
        $list =  '<div class="error_msg">
                            <div class="alert alert-danger text-center" role="alert">                        
                                <p>You need to <a class="btn btn-primary" href="'.esc_url( site_url('login') ).'?redirect_to='.get_permalink().'"  class="btn_color2">Login</a> to access the content!</p>
                            </div>
                        </div>';
    }
    return $list;
}
add_shortcode( 'classes', 'phosis_all_class_list' );


// 
function show_phosis_module_claasses_shortcode($atts){
    extract( shortcode_atts( array(
        'count' => -1,
        'tax' => 'module-1',
    ), $atts) );
    $i = 0;


    $user_id = get_current_user_id();

    
    $q = new WP_Query(
        array(
            'posts_per_page' => $count,             
            'post_type' => 'classes', 
            'order' => 'ASC', 
            'orderby' => 'title', 
            'tax_query' => array(
                array(
                    'taxonomy' => 'classes_cat',
                    'field'    => 'slug',
                    'terms'    => $tax,
                ),
            ),
            'paged'     => get_query_var('paged'),
        )
    );      
          
              $list = '<div class="phosis_module_lessons_area">';
                if($q->have_posts()){
                while($q->have_posts()) : $q->the_post();
                
                    $idd = get_the_ID();
                    $i++;

                    $class_access = can_user_access_content($user_id,$idd);
                    $post_categories = get_the_terms($idd, 'classes_cat');
                    
                    if($class_access){
                        $link = get_the_permalink(  );
                    }else{
                        $link = "##";
                    }
                    $custom_field = get_post_meta($idd, 'custom_field', true);
                    $post_content = get_the_excerpt();
$list .= '<div class="single_lesson_item">';

    if(!$class_access){
        $list .= '<div class="no_access">
                            <a href="##">
                            <h2>No Access</h2>
                        </a>
                    </div>';
        $list .=   "<script type='text/javascript'>
                        jQuery(document).ready(function($){
                            $('.no_access a').on('click', function(){
                                    Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'You don\'t have access!',
                                footer: '<a href=".get_home_url(null,'enroll').">Enroll now</a>'
                                });
                            });
                        });
                    </script>";
    } 
        
    $list .= '<div class="module_name"><h2>';
    foreach($post_categories as $cats){
        $list .= $cats->name;
    }
    $list .= '</h2></div>';
    $list .= '<div class="module_content"><h2>' .do_shortcode( get_the_title() ). '</h2>';
    $list .= '<a target="_blank" href="'.$link.'" class="visit_class">View</a>';
    $list .= '</div>';
    //  $list .=   '<h2><a href="'.get_permalink().'">' .do_shortcode( get_the_title() ). '</a></h2>';
                
$list .= '</div>';        
                endwhile;
            }else{
                $list .='<div class="error_msg">
                            <div class="alert alert-danger text-center" role="alert">                        
                                <p>No Class Found!</p>
                            </div>
                        </div>';
            }





     
    $total_pages = $q->max_num_pages;
    $big = 999999999;
    if ($total_pages > 1){  
        $current_page = max(1, get_query_var('paged'));  
        $list.= '<nav class="page-nav">';  
        $list.= paginate_links(array(  
            'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format'    => '?paged=%#%',  
            'current'   => $current_page,  
            'total'     => $total_pages,  
            'prev_text' => 'Prev',  
            'next_text' => 'Next' 
        ));  
        $list.= '</nav>';  
    }     
     
     
    $list.= '</div>';
    
    wp_reset_query();
    return $list;
}
add_shortcode('snow_classes', 'show_phosis_module_claasses_shortcode');