@navigation
Feature: navigate site
  In order to navigate though the application
  As a User
  I need to be able to move though all links

  Background:
	Given I am on the test site

  Scenario: signin page
    Given I am on "/mockup/guide"
	 Then I should see "style"
      And status should be OK

  Scenario Outline: demo pages
    Given I am on "<page>"
     Then I should see "<keyword>"
	  And status should be OK

	Scenarios:
	  | page    | keyword |
	  | /       | Mjolnir |
	  | /about  | Mjolnir |
	  | /start  | Mjolnir |
