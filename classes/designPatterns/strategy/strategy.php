<?php
/**Strategy pattern
 * Its goal is to separate strategies and to enable fast switching between them. For example, when sorting 
 * some string using some filtering for them (filters that are in separate classes and included by the needs)
 * 
 */
interface pricingStrategy{
	function price();
}

abstract class priceStrategy implements pricingStrategy{
	function __construct();
	function price();
}

class fixedPriceStrategy extends priceStrategy {
    function price() {
        return $fixed_rate_price;
    }
}

class hourlyPriceStrategy extends priceStrategy {
    function price() {
        return $hours*$hourlyRate;
    }
}

class project{
	public $pricing_structure;
	public function __construct(PriceStrategy $pricing_strategy) {
		$this->pricing_structure = $pricing_strategy;
		
	}
}

$project = new Project(new fixedPriceStrategy());
echo "The cost of the project is ".$project->pricing_structure->Price();