import re
from playwright.sync_api import sync_playwright, Page, expect

def run(page: Page):
    page.goto("http://127.0.0.1:8000/template1/single-product/1")

    # Wait for the page to be fully loaded
    page.wait_for_load_state("networkidle")

    # Take a screenshot for debugging
    page.screenshot(path="jules-scratch/verification/debug_screenshot.png")

    # Print the page content for debugging
    print(page.content())

    # Wait for the button to be visible
    add_to_cart_button = page.get_by_role("button", name="Add to Cart")
    add_to_cart_button.wait_for(state="visible")

    # Click the "Add to Cart" button
    add_to_cart_button.click()

    # Wait for the cart count to be updated
    expect(page.locator("#cart-count")).to_have_text("1")

    page.screenshot(path="jules-scratch/verification/verification.png")

def main():
    with sync_playwright() as p:
        browser = p.chromium.launch(headless=True)
        page = browser.new_page()
        run(page)
        browser.close()

if __name__ == "__main__":
    main()
