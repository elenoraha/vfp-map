<div class="map-usa">
    <div class="container">
        <div class="row map-usa--top_row">
            <div class="col-6">
                <div class="map-usa--description">
                    <?php echo the_field('map_description'); ?>
                </div>
                <div class="map-usa--states-mobile">
                    <label for="states-mobile" class="map-usa--mobile-description"><?php _e('Select a State'); ?></label>
                    <select name="states-mobile" id="states-mobile" class="map-usa--mobile-select">
                        <option value="AL"><?php _e("Alabama", "authentic_theme"); ?></option>
                        <option value="AK"><?php _e("Alaska", "authentic_theme"); ?></option>
                        <option value="AZ"><?php _e("Arizona", "authentic_theme"); ?></option>
                        <option value="AR"><?php _e("Arkansas", "authentic_theme"); ?></option>
                        <option value="CA"><?php _e("California", "authentic_theme"); ?></option>
                        <option value="NC"><?php _e("North Carolina", "authentic_theme"); ?></option>
                        <option value="SC"><?php _e("South Carolina", "authentic_theme"); ?></option>
                        <option value="CO"><?php _e("Colorado", "authentic_theme"); ?></option>
                        <option value="CT"><?php _e("Connecticut", "authentic_theme"); ?></option>
                        <option value="ND"><?php _e("North Dakota", "authentic_theme"); ?></option>
                        <option value="SD"><?php _e("South Dakota", "authentic_theme"); ?></option>
                        <option value="DE"><?php _e("Delaware", "authentic_theme"); ?></option>
                        <option value="FL"><?php _e("Florida", "authentic_theme"); ?></option>
                        <option value="GA"><?php _e("Georgia", "authentic_theme"); ?></option>
                        <option value="HI"><?php _e("Hawaii", "authentic_theme"); ?></option>
                        <option value="ID"><?php _e("Idaho", "authentic_theme"); ?></option>
                        <option value="IL"><?php _e("Illinois", "authentic_theme"); ?></option>
                        <option value="IN"><?php _e("Indiana", "authentic_theme"); ?></option>
                        <option value="IA"><?php _e("Iowa", "authentic_theme"); ?></option>
                        <option value="KS"><?php _e("Kansas", "authentic_theme"); ?></option>
                        <option value="KY"><?php _e("Kentucky", "authentic_theme"); ?></option>
                        <option value="LA"><?php _e("Louisiana,", "authentic_theme"); ?></option>
                        <option value="ME"><?php _e("Maine", "authentic_theme"); ?></option>
                        <option value="MD"><?php _e("Maryland", "authentic_theme"); ?></option>
                        <option value="MA"><?php _e("Massachusetts", "authentic_theme"); ?></option>
                        <option value="MI"><?php _e("Michigan", "authentic_theme"); ?></option>
                        <option value="MN"><?php _e("Minnesota", "authentic_theme"); ?></option>
                        <option value="MS"><?php _e("Mississippi", "authentic_theme"); ?></option>
                        <option value="MO"><?php _e("Missouri", "authentic_theme"); ?></option>
                        <option value="MT"><?php _e("Montana", "authentic_theme"); ?></option>
                        <option value="NE"><?php _e("Nebraska", "authentic_theme"); ?></option>
                        <option value="NV"><?php _e("Nevada", "authentic_theme"); ?></option>
                        <option value="NJ"><?php _e("New Jersey", "authentic_theme"); ?></option>
                        <option value="NY"><?php _e("New York", "authentic_theme"); ?></option>
                        <option value="NH"><?php _e("New Hampshire", "authentic_theme"); ?></option>
                        <option value="NM"><?php _e("New Mexico", "authentic_theme"); ?></option>
                        <option value="OH"><?php _e("Ohio", "authentic_theme"); ?></option>
                        <option value="OK"><?php _e("Oklahoma", "authentic_theme"); ?></option>
                        <option value="OR"><?php _e("Oregon", "authentic_theme"); ?></option>
                        <option value="PA"><?php _e("Pennsylvania", "authentic_theme"); ?></option>
                        <option value="RI"><?php _e("Rhode Island", "authentic_theme"); ?></option>
                        <option value="TN"><?php _e("Tennessee", "authentic_theme"); ?></option>
                        <option value="TX"><?php _e("Texas", "authentic_theme"); ?></option>
                        <option value="UT"><?php _e("Utah", "authentic_theme"); ?></option>
                        <option value="VT"><?php _e("Vermont", "authentic_theme"); ?></option>
                        <option value="VA"><?php _e("Virginia", "authentic_theme"); ?></option>
                        <option value="WV"><?php _e("West Virginia", "authentic_theme"); ?></option>
                        <option value="WA"><?php _e("Washington", "authentic_theme"); ?></option>
                        <option value="WI"><?php _e("Wisconsin", "authentic_theme"); ?></option>
                        <option value="WY"><?php _e("Wyoming", "authentic_theme"); ?></option>
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="map-usa--title-wrapper">
                    <h2 class="map-usa--state-title"></h2>
                    <p class="map-usa--election-date" data-has-active-election="false"><?php the_field('election_date_description'); ?></p>
                    <a class="button_primary button_shadow" href="#" data-has-active-election="false"><?php _e('Learn more', 'authentic_theme'); ?></a>
                </div>
            </div>
        </div>
        <div class="row map-usa--map_row">
            <div class="col-6 p-static">
                <div class="map-usa--states">

                    <?php include('map-parts/generate-states-class.php'); ?>
                    <?php include('map-parts/map-usa.html'); ?>

                </div>

            </div>
            <div class="col-6 col-candidates map-usa--senators">
                <div id="map-usa--states-data" class="map-usa--states-data cols-24">

                </div>
                <div class="map-usa--key-wrapper">
                    <div class="map-usa--key-title"><?php the_field('map_key_title'); ?></div>
                    <svg class="map-usa--key-ornament" width="324" height="59" viewBox="0 0 324 59" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="29.5" cy="29.5" r="29.5" fill="#2487BE" />
                        <path d="M56.5 40L79 53.5H324" stroke="#2487BE" stroke-width="2" />
                    </svg>

                    <div class="map-usa--key-description"><?php the_field('map_key_description'); ?></div>
                </div>
            </div>
        </div>
    </div>
</div>