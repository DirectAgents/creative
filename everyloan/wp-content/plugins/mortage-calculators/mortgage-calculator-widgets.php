<?php

add_action('widgets_init', create_function( '', 'register_widget("MCMonthlyPayment_Widget");' ) );
add_action('widgets_init', create_function( '', 'register_widget("MCRefinancing_Widget");' ) );
add_action('widgets_init', create_function( '', 'register_widget("MCTermComparison_Widget");' ) );
add_action('widgets_init', create_function( '', 'register_widget("MCInterestOnly_Widget");' ) );


class MCMonthlyPayment_Widget extends MortgageCalculatorWidgets {
    function __construct() {
        $this->name = 'Mortgage Monthly Payment Calculator';
        $this->desc = 'Mortgage Monthly Payment Calculator';
        $this->func = 'show_mortgage_monthlypayment_calc';
        parent::__construct();
    }
}

class MCRefinancing_Widget extends MortgageCalculatorWidgets {
    function __construct() {
        $this->name = 'Mortgage Refinancing Calculator';
        $this->desc = 'Mortgage Refinancing Calculator';
        $this->func = 'show_mortgage_refinancing_calc';
        parent::__construct();
    }
}

class MCTermComparison_Widget extends MortgageCalculatorWidgets {
    function __construct() {
        $this->name = 'Mortgage Term Comparison Calculator';
        $this->desc = 'Mortgage Term Comparison Calculator';
        $this->func = 'show_mortgage_termcomparison_calc';
        parent::__construct();
    }
}

class MCInterestOnly_Widget extends MortgageCalculatorWidgets {
    function __construct() {
        $this->name = 'Mortgage Interest Only Loan Calculator';
        $this->desc = 'Mortgage Interest Only Loan Calculator';
        $this->func = 'show_mortgage_interestonly_calc';
        parent::__construct();
    }
}

class MortgageCalculatorWidgets extends WP_Widget {
    public $name;
    public $desc;
    public $func;

    function __construct() {
        parent::WP_Widget($this->name, $this->desc, array('description'=>$this->desc));
    }

    function widget($args, $instance){
        $func = $this->func;
        $contents = $func(true);
        echo $contents;
    }
}

?>