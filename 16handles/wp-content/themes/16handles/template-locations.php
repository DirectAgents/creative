<?php
/**
 * Template Name: Location Page
 *
 * @package WordPress
 * @subpackage 16 Handles
 */

get_header(); 
$post_id = get_the_ID();
?>
<script type="javascript/template" id="location_template_inside">
            <div class="content">
                <div class="carrousel_items_prod">
                    <div class="carrousel items_prod carrousel_slide_section">
                        <ul class="slide_section">
                            <li id="item_{{id}}_0">
                                <div class="content_slide">
                                <div class="local_options ">
                                    <img class="img_main" src="{{featured_image}}"/>
                                    <div class="opt" id="links_below">
                                        <a class="btn_link_2 btn_center caroufredsel" href="#item_{{id}}_1">
                                            <p class="first_title">Cake Inquiry&#42;</p>
                                        </a>
                                        <a class="btn_link_2 btn_center caroufredsel" href="#item_{{id}}_2">
                                            <p class="first_title">Party Inquiry&#42;</p>
                                        </a>
                                        <a class="btn_link_2 btn_center caroufredsel end_bottom" href="#item_{{id}}_3">
                                            <p class="first_title">Catering Inquiry&#42;</p>
                                        </a>
                                        <p class="call-to-confirm">&#42;Store will call to confirm</p>
																				<span class="kosher_icon icon_{{kosher_icon}}"></span>				
                                    </div>
                                </div>                                
                                {{#hiring}}        
                                    <div class="col_wrap">
                                        <a class="btn_link_2 hiring" href="/careers">
                                            <p class="first_title">Now Hiring! Click to Apply</p>
                                        </a>
                                    </div>  
                                {{/hiring}}                                                
                                <div class="mini_col_1_3">
                                    <div class="col_1_3 ">
                                        <h3 class="title_4">Contact</h3>
                                        <p class="">{{address}}<br/>
                                        {{city}}<br/>
                                        <span class="mobile_tel">{{phone}}</span><br/>
                                        <a href="mailto:{{email}}">{{email}}</a></p>
                                    </div>
                                    <div class="col_1_3">
                                        <h3 class="title_4">Store Hours</h3>
                                        <p>{{store_hours}}</p>
                                    </div>
                                    <div class="col_1_3">
                                        <h3 class="title_4">News & Events</h3>
                                        <p>{{events}}</p>
                                    </div>
                                </div>
                                <h4 class="title_4"><span class="line"></span>Flavors<span class="line"></span></h4>
                                <div class="carrousel_items_prod">
                                    <div class="carrousel items_prod items_info_extra end_bottom">
                                        <ul class="slide" id="cakes_slider">
                                            {{#flavors_and_cakes}}
                                                <li>
                                                    <div class="avatar">
                                                        <img src="{{image}}" />
                                                        <h6>{{name}}</h6>
                                                        <div class="arrow"></div>
                                                    </div>
                                                    <div class="txt" id="nutrition_facts_{{id}}">
                                                        <div class="close"></div>
                                                        <div class="col_1_3">
                                                            <h4>{{long_name}}</h4>
                                                            {{#ingredients}}
                                                                <img src="{{.}}"/>
                                                            {{/ingredients}}
                                                        </div>
																												{{#cake_description}}
	                                                        <div class="col_1_3">
																														{{cake_description}}
	                                                        </div>																												
																												{{/cake_description}}
																												{{^cake_description}}
	                                                        {{#nutrition_facts}}
	                                                            <div class="col_1_3">
	                                                                <h5>Nutrition facts</h5>
	                                                                <div class="ing">
	                                                                    <p>Serving Size: {{serving_size}}</p>
	                                                                    <hr />
	                                                                    <p>Amount Per Serving</p>
	                                                                    <p><b>Calories:</b> {{calories}}<span>Calories from Fat: {{calories_from_fat}}</span></p>
	                                                                    <hr />
	                                                                    <p><span>% Daily Values*</span></p>
	                                                                    <p><b>Total Fat:</b> {{total_fat}} <span>{{total_fat_dv}}</span></p>
	                                                                    <p class="indent">Saturated Fat: {{saturated_fat}} <span>{{saturated_fat_dv}}</span></p>
	                                                                    <p class="indent">Polyunsaturated Fat {{poly_fat}}</p>
	                                                                    <p class="indent">Monounsaturated Fat: {{mono_fat}}</p>
	                                                                    <p><b>Cholesterol:</b> {{cholesterol}} <span>{{cholesterol_dv}}</span></p>
	                                                                    <p><b>Sodium:</b> {{sodium}} <span>{{sodium_dv}}</span></p>
	                                                                    <p><b>Total Carbohydrate:</b> {{total_carb}}</p>
	                                                                    <p class="indent">Dietary Fiber: {{dietary_fiber}} <span>{{dietary_fiber_dv}}</span></p>
	                                                                    <p class="indent">Sugars: {{sugars}} <span>{{sugars_dv}}</span></p>
	                                                                </div>
	                                                            </div>
	                                                            <div class="col_1_3">
	                                                                <div class="ing">
	                                                                    <hr />
	                                                                    <p><span>% Daily Values*</span></p>
	                                                                    <p><b>Protein:</b> {{protein}}</p>
	                                                                    <hr />
	                                                                    <div class="col_1_2">
	                                                                        <p>Vitamin A: {{vit_a}}</p>
	                                                                        <p>Vitamin C: {{vit_b}}</p>
	                                                                    </div>
	                                                                    <div class="col_1_2">
	                                                                        <p>Calcium: {{calcium}}</p>
	                                                                        <p>Iron: {{iron}}</p>
	                                                                    </div>
	                                                                    <hr />
	                                                                </div>
	                                                            </div>
	                                                        {{/nutrition_facts}}
																												{{/cake_description}}
                                                    </div>
                                                </li>
                                            {{/flavors_and_cakes}}
                                        </ul>
                                        <a class="prev" id="cake_prev_{{id}}" href="#"><span>prev</span></a>
                                        <a class="next" id="cake_next_{{id}}" href="#"><span>next</span></a>
                                    </div>
                                </div>
                                </div>
                            </li>
                            <li id="item_{{id}}_1">
                                <div class="content_slide">
                                    <div class="msg order_cake">
                                        <div class="cont">
                                            <h3>Cake Order Summary</h3>
                                            <div class="cake_items">                                              
                                            </div>
                                            <hr class="hr_1"/>
                                            <div class="col_1_2">
                                                <p class="sync_in order_cake_name"></p>
                                                <p class="sync_in order_cake_email"></p>
                                                <p class="sync_in order_cake_phone"></p>
                                            </div>
                                            <div class="col_1_2 col_total">
                                                <p>Tax: $<span class="sync_in order_cake_tax"></span></p>
                                                <p>Total: $<span class="sync_in order_cake_total"></span></p>
                                            </div>
                                        </div>                                    
                                        <a data-form-type="order_cake" class="confirm confirm_gf_action">
                                            <p>Confirm</p>
                                            <div class="arrow"></div>
                                        </a>
                                    </div>
                                    <h4 class="title_4"><span class="line"></span>Information<span class="line"></span></h4>
                                    <form data-gravity-form-type="order_cake" data-form-loc-name="{{title}}" class="gf_submit order_cake validate bottom_left_error">
                                        <div class="cont_1">
                                            <div class="col_1_3">
                                                <div class="field">
                                                    <input data-gf-field="order_cake_name" name="name" type="text" placeholder="Name"/>
                                                </div>
                                                <div class="field">
                                                    <input data-gf-field="order_cake_email" name="email" type="text" placeholder="Email"/>
                                                </div>
                                            </div>
                                            <div class="col_1_3">
                                                <div class="field">
                                                    <input data-gf-field="order_cake_phone" name="phone" type="text" placeholder="Phone"/>
                                                </div>
                                                <div class="field">
                                                    <div class="date_icon"></div>
                                                    <input id="datepicker_normal_1" data-gf-field="order_cake_pickup_date" name="date" type="text" placeholder="Pick Up Date"/>
                                                </div>
                                            </div>
                                            <div class="col_1_3">
                                                <div class="field">
                                                    <div class="select btn_select select_grey">
                                                        <div class="box btn_link_2">
                                                            <p class="state first_title">Cake Size</p>
                                                            <div class="arrow"></div>
                                                        </div>
                                                        <div class="options select_fill_in" data-gf-field="order_cake_size">
                                                            <div class="arrow"></div>
                                                        </div>
                                                    </div>
                                                    <div class="clarification"><p><?php echo of_get_option('cake_prices_range') ?></p></div>
                                                </div>
                                            </div>
                                        </div>
                                        <h4 class="title_4" style="margin-top: 25px;margin-bottom: 25px;"><span class="line"></span>Select a cake<span class="line"></span></h4>
                                        <div class="carrousel_items_prod" style="margin-bottom: 45px;">
                                            <div class="carrousel carrousel_4 items_prod">
                                                <ul class="slide order_cakes_slider">
                                                    {{#flavors_and_cakes}}
                                                        <li>
                                                            <div class="avatar">
                                                                <div class="custom_checkbox">
                                                                    <input type="checkbox" name="cake" data-name="{{name}}" class="styled" data-cnt="1"/>
                                                                </div>
                                                                <img src="{{image}}" />
                                                                <h6>{{name}}</h6>
                                                            </div>
                                                        </li>
                                                    {{/flavors_and_cakes}}
                                                </ul>
                                                <a class="prev" id="order_cake_prev_{{id}}" href="#"><span>prev</span></a>
                                                <a class="next" id="order_cake_next_{{id}}" href="#"><span>next</span></a>
                                            </div>
                                        </div>
                                        <h4 class="title_4"><span class="line"></span>Add a message<span class="line"></span></h4>
                                        <div class="cont_1">
                                            <div class="col_1_3">
                                                <div class="select btn_select select_grey">
                                                    <div class="box btn_link_2">
                                                        <p class="state first_title">Message Type</p>
                                                        <div class="arrow"></div>
                                                    </div>
                                                    <div class="options select_fill_in" data-gf-field="order_cake_message_type">
                                                        <div class="arrow"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col_1_3">
                                                <div class="select btn_select select_grey">
                                                    <div class="box btn_link_2">
                                                        <p class="state first_title">Message Color</p>
                                                        <div class="arrow"></div>
                                                    </div>
                                                    <div class="options select_fill_in" data-gf-field="order_cake_message_color">
                                                        <div class="arrow"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col_1_3">
                                                <div class="field">
                                                    <input  data-gf-field="order_cake_message" name="message" type="text" placeholder="Message"/>
                                                    <div class="clarification"><p>*16 Character Limit</p></div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="hr_1"/>
                                        <div class="cont_1">
                                            <div class="col_1_3">
                                                <a class="btn_link_2 btn_link_5 btn_left btn_link_icon caroufredsel" href="#item_{{id}}_0">
                                                    <p class="first_title"><span class="arrow"></span>Back</p>
                                                </a>
                                            </div>
                                            <div class="col_2_3">
                                                <div class="field field_checkbox">
                                                </div>
                                                <div class="field btn_submit btn_submit_resume">
                                                    <span class="arrow"></span>
                                                    <span class="qty">Qty: 0 | $0.00</span>
                                                    <span class="sep"></span>
                                                    <input class="btn_link_2" type="submit" value="Submit"/>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li id="item_{{id}}_2">
                                <div class="content_slide">
                                    <div class="msg msg_1 party_inquiry">
                                        <div class="cont">
                                            <h3>Party inquiry Summary</h3>
                                            <div class="col_1_2">
                                                <p>Party Request </p>
                                                <p><span class="sync_in party_inquiry_party_date" ></span> – <span class="sync_in party_inquiry_party_time"></span></p>
                                                <p><span class="sync_in party_inquiry_attendees"></span> Attendees</p>
                                            </div>
                                            
                                            <div class="col_1_2">
                                                
                                                <p class="sync_in party_inquiry_email"></p>
                                                <p class="sync_in party_inquiry_phone"></p>
                                            </div>
                                        </div>
                                        <a data-form-type="party_inquiry" class="confirm confirm_gf_action">
                                            <p>Confirm</p>
                                            <div class="arrow confirm_inquiry"></div>
                                        </a>
                                    </div>
                                    <h4 class="title_4"><span class="line"></span>Party inquiry<span class="line"></span></h4>
                                <form data-gravity-form-type="party_inquiry" data-form-loc-name="{{title}}" class="form_2 party_inquiry gf_submit validate bottom_left_error">
                                    <div class="cont_1">
                                        <div class="col_1_3">
                                            <div class="field">
                                                <div class="req">*</div>
                                                <input data-gf-field="party_inquiry_name" class="sync_out" name="name" type="text" placeholder="Name"/>
                                            </div>
                                            <div class="field">
                                                <div class="req">*</div>
                                                <input data-gf-field="party_inquiry_email" class="sync_out" name="email" type="text" placeholder="Email"/>
                                            </div>
                                        </div>
                                        <div class="col_1_3">
                                            <div class="field">
                                                <div class="req">*</div>
                                                <input data-gf-field="party_inquiry_phone" name="phone" type="text" placeholder="Phone"/>
                                            </div>
                                            <div class="field">
                                                <div class="req">*</div>
                                                <input data-gf-field="party_inquiry_attendees" name="attendees" type="text" placeholder="Attendees"/>
                                            </div>
                                        </div>
                                        <div class="col_1_3">
                                            <div class="field">
                                                <div class="req">*</div>
                                                <div class="date_icon"></div>
                                                <input id="datepicker_normal_2" data-gf-field="party_inquiry_party_date" name="party_date" type="text" placeholder="Party Date"/>
                                            </div>
                                            <div class="field">
                                                <div class="title"><p>Party<br/> Time</p></div>
                                                <div class="time">
                                                    <input data-gf-field="party_inquiry_party_time" name="party_time" id="amount04" class="amount" type="text" />
                                                    <div id="thurs" class="ranges"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cont_1">
                                        <div class="col_1_3">
                                            <a class="btn_link_2 btn_link_5 btn_left btn_link_icon caroufredsel" href="#item_{{id}}_0">
                                                <p class="first_title"><span class="arrow"></span>Back</p>
                                            </a>
                                        </div>
                                        <div class="col_1_3">
                                            <div class="field">
                                            </div>
                                        </div>
                                        <div class="col_1_3">
                                            <div class="field btn_submit">
                                                <span class="arrow"></span>
                                                <input class="btn_link_2" type="submit" value="Submit"/>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                </div>
                            </li>
                            <li id="item_{{id}}_3">
                                <div class="content_slide">
                                    <div class="msg catering_inquiry">
                                        <div class="cont">
                                            <h3>Catering Inquiry Summary</h3>
                                            <div class="col_1_2">
                                                <p><span class="sync_in catering_inquiry_date" ></span> – <span class="sync_in catering_inquiry_time"></span></p>
                                                <p><span class="sync_in catering_inquiry_address"></span></p>
                                            </div>

                                            <div class="col_1_2">

                                                <p class="sync_in catering_inquiry_email"></p>
                                                <p class="sync_in catering_inquiry_phone"></p>
                                            </div>
                                        </div>
                                        <a data-form-type="catering_inquiry" class="confirm confirm_gf_action">
                                            <p>Confirm</p>
                                            <div class="arrow"></div>
                                        </a>
                                    </div>
                                    <h4 class="title_4"><span class="line"></span>Catering inquiry<span class="line"></span></h4>
                                  <form data-gravity-form-type="catering_inquiry" data-form-loc-name="{{title}}" class="form_3 catering_inquiry gf_submit validate bottom_left_error">  
                                    <div class="cont_1">
                                        <div class="col_1_3">
                                            <div class="field">
                                                <div class="req">*</div>
                                                <input data-gf-field="catering_inquiry_name" name="name" type="text" placeholder="Name"/>
                                            </div>
                                            <div class="field">
                                                <div class="req">*</div>
                                                <input data-gf-field="catering_inquiry_email" name="email" type="text" placeholder="Email"/>
                                            </div>
                                            <div class="field">
                                                <div class="req">*</div>
                                                <input data-gf-field="catering_inquiry_phone" name="phone" type="text" placeholder="Phone"/>
                                            </div>
                                        </div>
                                        <div class="col_1_3">
                                            <div class="field">
                                                <div class="req">*</div>
                                                <input data-gf-field="catering_inquiry_address" name="address" type="text" placeholder="Address"/>
                                            </div>
                                            <div class="field">
                                                <div class="req">*</div>
                                                <input data-gf-field="catering_inquiry_city" name="city" type="text" placeholder="City"/>
                                            </div>
                                            <div class="field field_1_2">
                                                <div class="select btn_select select_grey">
                                                    <div class="box btn_link_2">
                                                        <p class="state first_title">State</p>
                                                        <div class="arrow"></div>
                                                    </div>
                                                    <div class="options">
                                                        <div class="arrow"></div>
                                                        <div class="box">
                                                            <div class="option"><p class="data">AL</p><p>AL</p></div>
                                                            <div class="option"><p class="data">AK</p><p>AK</p></div>
                                                            <div class="option"><p class="data">AZ</p><p>AZ</p></div>
                                                            <div class="option"><p class="data">AR</p><p>AR</p></div>
                                                            <div class="option"><p class="data">CA</p><p>CA</p></div>
                                                            <div class="option"><p class="data">CO</p><p>CO</p></div>
                                                            <div class="option"><p class="data">CT</p><p>CT</p></div>
                                                            <div class="option"><p class="data">DE</p><p>DE</p></div>
                                                            <div class="option"><p class="data">FL</p><p>FL</p></div>
                                                            <div class="option"><p class="data">GA</p><p>GA</p></div>
                                                            <div class="option"><p class="data">HI</p><p>HI</p></div>
                                                            <div class="option"><p class="data">ID</p><p>ID</p></div>
                                                            <div class="option"><p class="data">IL</p><p>IL</p></div>
                                                            <div class="option"><p class="data">IN</p><p>IN</p></div>
                                                            <div class="option"><p class="data">IA</p><p>IA</p></div>
                                                            <div class="option"><p class="data">KS</p><p>KS</p></div>
                                                            <div class="option"><p class="data">KY</p><p>KY</p></div>
                                                            <div class="option"><p class="data">LA</p><p>LA</p></div>
                                                            <div class="option"><p class="data">ME</p><p>ME</p></div>
                                                            <div class="option"><p class="data">MD</p><p>MD</p></div>
                                                            <div class="option"><p class="data">MA</p><p>MA</p></div>
                                                            <div class="option"><p class="data">MI</p><p>MI</p></div>
                                                            <div class="option"><p class="data">MN</p><p>MN</p></div>
                                                            <div class="option"><p class="data">MS</p><p>MS</p></div>
                                                            <div class="option"><p class="data">MO</p><p>MO</p></div>
                                                            <div class="option"><p class="data">MT</p><p>MT</p></div>
                                                            <div class="option"><p class="data">NE</p><p>NE</p></div>
                                                            <div class="option"><p class="data">NV</p><p>NV</p></div>
                                                            <div class="option"><p class="data">NH</p><p>NH</p></div>
                                                            <div class="option"><p class="data">NJ</p><p>NJ</p></div>
                                                            <div class="option"><p class="data">NM</p><p>NM</p></div>
                                                            <div class="option"><p class="data">NY</p><p>NY</p></div>
                                                            <div class="option"><p class="data">NC</p><p>NC</p></div>
                                                            <div class="option"><p class="data">ND</p><p>ND</p></div>
                                                            <div class="option"><p class="data">OH</p><p>OH</p></div>
                                                            <div class="option"><p class="data">OK</p><p>OK</p></div>
                                                            <div class="option"><p class="data">OR</p><p>OR</p></div>
                                                            <div class="option"><p class="data">PA</p><p>PA</p></div>
                                                            <div class="option"><p class="data">RI</p><p>RI</p></div>
                                                            <div class="option"><p class="data">SC</p><p>SC</p></div>
                                                            <div class="option"><p class="data">SD</p><p>SD</p></div>
                                                            <div class="option"><p class="data">TN</p><p>TN</p></div>
                                                            <div class="option"><p class="data">TX</p><p>TX</p></div>
                                                            <div class="option"><p class="data">UT</p><p>UT</p></div>
                                                            <div class="option"><p class="data">VT</p><p>VT</p></div>
                                                            <div class="option"><p class="data">VA</p><p>VA</p></div>
                                                            <div class="option"><p class="data">WA</p><p>WA</p></div>
                                                            <div class="option"><p class="data">WV</p><p>WV</p></div>
                                                            <div class="option"><p class="data">WI</p><p>WI</p></div>
                                                            <div class="option"><p class="data">WY</p><p>WY</p></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="field field_1_2 field_1_2_end">
                                                <div class="req">*</div>
                                                <input data-gf-field="catering_inquiry_zipcode" name="zipcode" type="text" placeholder="Zipcode"/>
                                            </div>
                                        </div>
                                        <div class="col_1_3">
                                            <div class="field">
                                                <div class="req">*</div>
                                                <div class="date_icon"></div>
                                                <input id="datepicker_normal_3" data-gf-field="catering_inquiry_date" name="party_date" type="text" placeholder="Party Date"/>
                                            </div>
                                            <div class="field">
                                                <div class="title"><p>Time</p></div>
                                                <div class="time">
                                                    <input id="amount04" data-gf-field="catering_inquiry_time" class="amount" type="text" />
                                                    <div id="thurs" class="ranges"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cont_1">
                                        <div class="col_1_3">
                                            <a class="btn_link_2 btn_link_5 btn_left btn_link_icon caroufredsel" href="#item_{{id}}_0">
                                                <p class="first_title"><span class="arrow"></span>Back</p>
                                            </a>
                                        </div>
                                        <div class="col_1_3">
                                            <div class="field">
                                            </div>
                                        </div>
                                        <div class="col_1_3">
                                            <div class="field btn_submit">
                                                <span class="arrow"></span>
                                                <input class="btn_link_2" type="submit" value="Submit"/>
                                            </div>
                                        </div>
                                    </div>
                                  </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
</script>
<script type="javascript/template" id="location_template">
    <div class="head {{odd_even}} slug_{{slug}}" id="loc_id_{{id}}" data-slug="{{slug}}" data-locid="{{id}}">
        <div class="centerModule">
            <div class="box_1 title">
                <h2 class="title_2">{{title}}</h2>
                <p class="sub_title">{{address}}, {{city}} | {{phone}}</p>
            </div>
            <div class="box_2">
                <div class="box txt txt_1 distance"><p>{{#distance}}{{distance}}<span>m</span>{{/distance}}</p></div>
                <div class="box icon {{#features}}{{^catering}}icon_0{{/catering}}{{#catering}}icon_1{{/catering}}{{/features}}"></div>
                <div class="box icon {{#features}}{{^party_room}}icon_0{{/party_room}}{{#party_room}}icon_2{{/party_room}}{{/features}}"></div>
                <div class="box icon {{#features}}{{^cakes}}icon_0{{/cakes}}{{#cakes}}icon_3{{/cakes}}{{/features}}"></div>
                <div class="box icon {{#features}}{{^delivery}}icon_0{{/delivery}}{{#delivery}}icon_4{{/delivery}}{{/features}}"></div>                
            </div>
        </div>
    </div>
    <div class="cont">
    </div>    
    
</script>

<div class="main locations">
    <?php $attachment_id = get_field('header_background_image');
    $size = "page_header_image";
    $img = wp_get_attachment_image_src($attachment_id, $size);                      
    ?>
    <div class="main_title" style="background-image: url('<?php echo $img[0]; ?>')">
        <div class="centerModule">
            <h1>Locations</h1>
        </div>
    </div>
    <div class="map_locations">
        <div class="centerModule">
            <h3>Find a store:</h3>
            <div class="search">
                <div class="field">
                    <form class="search-by-zipcode">
                        <input name="zipcode" type="text" placeholder="Zipcode"/>
                        <input class="arrow" type="submit" value=""/>
                    </form>
                </div>
                <p>-OR-</p>
                <div class="field">
                    <div class="select btn_select search_by_state" id="search_by_state">
                        <div class="box btn_link_2">
                            <p class="state first_title">State</p>
                            <div class="arrow"></div>
                        </div>
                        <div class="options">
                            <div class="arrow"></div>
                            <div class="box">
                              <div class="option"><p class="data">AL</p><p>AL</p></div>
                              <div class="option"><p class="data">AK</p><p>AK</p></div>
                              <div class="option"><p class="data">AZ</p><p>AZ</p></div>
                              <div class="option"><p class="data">AR</p><p>AR</p></div>
                              <div class="option"><p class="data">CA</p><p>CA</p></div>
                              <div class="option"><p class="data">CO</p><p>CO</p></div>
                              <div class="option"><p class="data">CT</p><p>CT</p></div>
                              <div class="option"><p class="data">DE</p><p>DE</p></div>
                              <div class="option"><p class="data">FL</p><p>FL</p></div>
                              <div class="option"><p class="data">GA</p><p>GA</p></div>
                              <div class="option"><p class="data">HI</p><p>HI</p></div>
                              <div class="option"><p class="data">ID</p><p>ID</p></div>
                              <div class="option"><p class="data">IL</p><p>IL</p></div>
                              <div class="option"><p class="data">IN</p><p>IN</p></div>
                              <div class="option"><p class="data">IA</p><p>IA</p></div>
                              <div class="option"><p class="data">KS</p><p>KS</p></div>
                              <div class="option"><p class="data">KY</p><p>KY</p></div>
                              <div class="option"><p class="data">LA</p><p>LA</p></div>
                              <div class="option"><p class="data">ME</p><p>ME</p></div>
                              <div class="option"><p class="data">MD</p><p>MD</p></div>
                              <div class="option"><p class="data">MA</p><p>MA</p></div>
                              <div class="option"><p class="data">MI</p><p>MI</p></div>
                              <div class="option"><p class="data">MN</p><p>MN</p></div>
                              <div class="option"><p class="data">MS</p><p>MS</p></div>
                              <div class="option"><p class="data">MO</p><p>MO</p></div>
                              <div class="option"><p class="data">MT</p><p>MT</p></div>
                              <div class="option"><p class="data">NE</p><p>NE</p></div>
                              <div class="option"><p class="data">NV</p><p>NV</p></div>
                              <div class="option"><p class="data">NH</p><p>NH</p></div>
                              <div class="option"><p class="data">NJ</p><p>NJ</p></div>
                              <div class="option"><p class="data">NM</p><p>NM</p></div>
                              <div class="option"><p class="data">NY</p><p>NY</p></div>
                              <div class="option"><p class="data">NC</p><p>NC</p></div>
                              <div class="option"><p class="data">ND</p><p>ND</p></div>
                              <div class="option"><p class="data">OH</p><p>OH</p></div>
                              <div class="option"><p class="data">OK</p><p>OK</p></div>
                              <div class="option"><p class="data">OR</p><p>OR</p></div>
                              <div class="option"><p class="data">PA</p><p>PA</p></div>
                              <div class="option"><p class="data">RI</p><p>RI</p></div>
                              <div class="option"><p class="data">SC</p><p>SC</p></div>
                              <div class="option"><p class="data">SD</p><p>SD</p></div>
                              <div class="option"><p class="data">TN</p><p>TN</p></div>
                              <div class="option"><p class="data">TX</p><p>TX</p></div>
                              <div class="option"><p class="data">UT</p><p>UT</p></div>
                              <div class="option"><p class="data">VT</p><p>VT</p></div>
                              <div class="option"><p class="data">VA</p><p>VA</p></div>
                              <div class="option"><p class="data">WA</p><p>WA</p></div>
                              <div class="option"><p class="data">WV</p><p>WV</p></div>
                              <div class="option"><p class="data">WI</p><p>WI</p></div>
                              <div class="option"><p class="data">WY</p><p>WY</p></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="gmap_canvas"></div>
    </div>
    <div class="centerModule">
        <div class="accordion_head" style="display:none">
            <div class="box_2">
                <div class="box icon icon_4"><div class="icon_graph"></div><p>Delivery</p></div>
                <div class="box icon icon_3"><div class="icon_graph"></div><p>Cakes</p></div>
                <div class="box icon icon_2"><div class="icon_graph"></div><p>Party Room</p></div>
                <div class="box icon icon_1"><div class="icon_graph"></div><p>Catering</p></div>
                
            </div>
        </div>
    </div>
    <div id="locations_results_container">
    </div>
    <a class="btn_link_1" href="/info/">
        <p class="title_1 first_title">Didn’t find a store near you? why not open your own?!<span class="arrow"></span></p>
    </a>
</div>
<div class="g_forms_for_location_inq">
  <div class="input_form party_inquiry">
    <?php echo do_shortcode('[gravityform id="3" name="Party Inquiry" title="false" description="false"]') ?>
  </div>
  <div class="input_form catering_inquiry">
    <?php echo do_shortcode('[gravityform id="4" name="Catering Inquiry" title="false" description="false"]') ?>
  </div>
  <div class="input_form order_cake">
    <?php echo do_shortcode('[gravityform id="5" name="Order Cake" title="false" description="false"]') ?>
  </div>
</div>
<?php get_footer(); ?>