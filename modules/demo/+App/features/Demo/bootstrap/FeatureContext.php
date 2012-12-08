<?php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkDictionary;

\mjolnir\cfs\Mjolnir::behat();

/**
 * Features context.
 */
class FeatureContext extends BehatContext
{
    use MinkDictionary;
	
	/**
	 * @var array
	 */
	protected $parameters;

    /**
     * Initializes context.
     * Every scenario gets it's own context object.
     *
     * @param array $parameters context parameters (set them up through behat.yml)
     */
    function __construct(array $parameters)
    {
		$this->parameters = $parameters;
	}
	
	/**
	 * @Given /^I am on the test site$/
	 */
	public function iAmOnTheTestSite()
	{
		// retrieve testsite
		$testsite = \app\Filesystem::gets(DOCROOT.'.testsite', null);
		
		if ($testsite === null || ($testsite = \trim($testsite, "\n\r ")) === '')
		{
			throw new Exception('A .testsite file is required on your DOCROOT, with a valid URL');
		}
		
		\app\Filesystem::makedir(DOCROOT.'+App/tmp/');
		
		$this->parameters['base_url'] = $testsite;
		$this->parameters['show_tmp_dir'] = DOCROOT.'+App/tmp/';
		
		$this->setMinkParameters($this->parameters);
	}
	
	/**
	 * @Then /^status should be OK$/
	 */
	public function statusShouldBeOk()
	{
		$this->assertSession()->statusCodeEquals(200);
	}
	
	/**
	 * @Given /^I wait (\d+)s$/
	 */
	public function iWait($seconds)
	{
		$this->getSession()->wait(1000 * $seconds);
	}
	
	/**
	 * @Given /^I wait for loading$/
	 */
	public function iWaitForLoading()
	{
	   $this->getSession()->wait(2000, 'typeof $ !== "undefined" && $(\'[data-loading="true"]\').length == 0');
	}
	
	/**
	 * @Given /^the site is prepared for testing$/
	 */
	public function theSiteIsPreparedForTesting()
	{
		\app\Model_User::clear_cache();
		\app\Model_Organization::clear_cache();
		
		// check if the site is safe to test on; we don't just simply create 
		// the user since then the test would fail on the next test iteration
		$is_test_database
			 = \app\Model_User::count() == 1
			&& \app\Model_User::exists('manager', 'nickname')
			&& \app\Model_User::exists('manager@managers.test', 'email')
			&& \app\Model_Organization::count() == 1
			&& \app\Model_Organization::exists('test', 'title');
		
		if ( ! $is_test_database)
		{
			die("\n [!!] You SHOULD NOT run tests on a non-specialized server! Guranteed to cause damage.\n");
		}
		
		// good to go
		\app\SQL::prepare(__METHOD__, 'SET foreign_key_checks = 0;')->execute();
		\app\Model_Task::truncate();
		\app\SQL::prepare(__METHOD__, 'SET foreign_key_checks = 1;')->execute();
	}
	
} # context
