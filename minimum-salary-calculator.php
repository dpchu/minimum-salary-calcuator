<?php
/**
 * @package Minimum_salary_calculator
 * @version 1.0.0
 */
/*
Plugin Name: Minimum Salary Calculator
Plugin URI: http://wordpress.org/plugins/minimum-salary-calculator/
Description: Enter your monthly expense total and you will get a chart with the minimum hourly or annual salary you can tolerate.
Author: David Choung
Version: 1.0.0
Author URI: https://dchoung.com
*/


function display_calculator()
{
	$mycalculator = "
	<table border='0' cellpadding='5' cellspacing='5' style='background-color: #fff;'>
	<tr><th colspan='2'>Minimum Salary Calculator (USD $)</th></tr>
	<tr><td colspan='2' style='font-style: italic; color: #4c00b0;'>*** disclaimer: this is for fun, I am not an accountant, go see a real one. ***</td></tr>
	<tr>
		<th>Proposed Annual Gross Salary</th>
		<td><input type='text' size='10' id='gross_annual' class='form-control' /></td>
	</tr>
	<tr>
		<th>Estimated Tax Percentage</th>
		<td><input type='text' size='10' id='estimated_taxes' class='form-control' placeholder='30' /></td>
	</tr>
	<tr>
		<th>Monthly Expense Total</th>
		<td><input type='text' size='10' id='monthly_expense'  class='form-control' /></td>
	</tr>
	<tr>
		<td colspan='2' align='center'><button type='button' class='btn btn-primary btn-lg' id='submit_button'>Submit</button>&nbsp;<button type='button' class='btn btn-primary btn-lg' id='clear_button'>Clear</button></td>
	</tr>
	<tr>
		<td colspan='2' style='text-align: center;'>Could this salary cover your monthly expenses?</td>
	</tr>
	<tr>
		<td colspan='2' style='text-align: center; font-weight: bold; font-size: 20px; color: #4c00b0;' id='annual_div_twelve'></td>
	</tr>
	<tr>
		<td colspan='2' id='result' style='text-align: center; font-weight: bold; font-size: 40px; color: #4c00b0;'></td>
	</tr>
	<tr>
		<td colspan='2' id='need' style='text-align: center; font-weight: bold; font-size: 30px; color: #4c00b0;'></td>
	</tr>
	</table>";

	return $mycalculator;
}

function register_calc(){
	add_shortcode('min_sal_calc', 'display_calculator');
	
}

function my_footer(){
	wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css');
	wp_enqueue_script('minsalcalc', plugin_dir_url( __FILE__ ) . 'min-sal-calc.js', [], 1.0,[], 'defer', true);
}

add_action('init', 'register_calc');
add_action('wp_footer', 'my_footer');
