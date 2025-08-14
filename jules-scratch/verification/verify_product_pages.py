from playwright.sync_api import sync_playwright

def run(playwright):
    browser = playwright.chromium.launch()
    page = browser.new_page()

    base_url = "http://127.0.0.1:8000"

    # Navigate to product page 1 and take a screenshot
    page.goto(f"{base_url}/product1")
    page.screenshot(path="jules-scratch/verification/product1.png")

    # Navigate to product page 2 and take a screenshot
    page.goto(f"{base_url}/product2")
    page.screenshot(path="jules-scratch/verification/product2.png")

    # Navigate to product page 3 and take a screenshot
    page.goto(f"{base_url}/product3")
    page.screenshot(path="jules-scratch/verification/product3.png")

    # Navigate to product page 4 and take a screenshot
    page.goto(f"{base_url}/product4")
    page.screenshot(path="jules-scratch/verification/product4.png")

    browser.close()

with sync_playwright() as playwright:
    run(playwright)
