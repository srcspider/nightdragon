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

} # context
