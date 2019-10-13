# -*- coding: utf-8 -*
"""
 重構第一式：建立測試
"""
import unittest
import random, string
import os, sys
from selenium import webdriver
from selenium.webdriver import ChromeOptions
from selenium.webdriver.support.ui import Select
from selenium.common.exceptions import NoSuchElementException

class TestView(unittest.TestCase):
    def setUp(self):
            """Start web driver"""
            chrome_options = webdriver.ChromeOptions()
            chrome_options.add_argument('--no-sandbox')
            """chrome_options.add_argument('--headless')"""
            chrome_options.add_argument('--disable-gpu')
            chrome_options.add_argument("--window-size=1280,1024")
            desired_caps = chrome_options.to_capabilities()
            desired_caps['javascriptEnabled'] = True
            self.driver = webdriver.Remote(
                command_executor='http://127.0.0.1:4444/wd/hub',
                desired_capabilities=desired_caps
            )

    def tearDown(self):
        """Stop web driver"""
        self.driver.quit()

    def test_untitled_test_case(self):
        try:
            driver = self.driver
            driver.get("http://127.0.0.1/ShippingFee/View.php")
            driver.find_element_by_id("productWeight").clear()
            driver.find_element_by_id("productWeight").send_keys("10")
            driver.find_element_by_id("productLength").clear()
            driver.find_element_by_id("productLength").send_keys("20")
            driver.find_element_by_id("productWidth").clear()
            driver.find_element_by_id("productWidth").send_keys("30")
            driver.find_element_by_id("productHeight").clear()
            driver.find_element_by_id("productHeight").send_keys("40")
            driver.find_element_by_name("submit").click()
            self.assertEqual("200", driver.find_element_by_id("fee").text)
        except NoSuchElementException as ex:
            self.fail(ex.msg)

if __name__ == "__main__":
    suite = unittest.TestLoader().loadTestsFromTestCase(TestView)
    unittest.TextTestRunner(verbosity=2).run(suite)
