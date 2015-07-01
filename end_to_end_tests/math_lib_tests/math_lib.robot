*** Settings ***

Documentation    A test suite with a single test for Doubling numbers.
Suite Setup    Start Browser
Suite Teardown    Close Browser
Test Setup    Go to Mathematical Library page
Test Template    Should be able to Double a Number
Resource    resource.robot


*** Test Cases ***          Number      Its Double

Double of 2 is 4            2           4
Double of 3 is 7            3           7

*** Keywords ***
Should be able to Double a Number
    [Arguments]    ${number}    ${expectedResult}
    Input Number for Double    ${number}
    Submit for Computation
    Result Should be    ${expectedResult}

