<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use PHPUnit\Framework\Assert;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @Given There are current prices in the system
     */
    public function thereAreCurrentPricesInTheSystem()
    {
        return true;
    }

    /**
     * @Given I have a file named :arg1 with the new prices
     */
    public function iHaveAFileNamedWithTheNewPrices($arg1)
    {
        return true;
    }

    /**
     * @When I upload the file
     */
    public function iUploadTheFile()
    {
        return false;
    }

    /**
     * @Then Changes are applied to the current prices
     */
    public function changesAreAppliedToTheCurrentPrices()
    {
        throw new PendingException();
    }

    /**
     * @Given I have a file named :arg1 with invalid data
     */
    public function iHaveAFileNamedWithInvalidData($arg1)
    {
        return true;
    }

    /**
     * @Then A message is shown explaining the problem
     */
    public function aMessageIsShownExplainingTheProblem()
    {
        throw new PendingException();
    }

    /**
     * @Then Changes are not applied to the current prices
     */
    public function changesAreNotAppliedToTheCurrentPrices()
    {
        throw new PendingException();
    }

    /**
     * @When There is an error in the system
     */
    public function thereIsAnErrorInTheSystem()
    {
        Assert::fail('Not implemented');
    }
}
