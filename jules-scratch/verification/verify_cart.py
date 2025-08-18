from playwright.sync_api import sync_playwright, expect

def run(playwright):
    browser = playwright.chromium.launch(headless=True)
    context = browser.new_context()
    page = context.new_page()

    # Go to the single product page
    page.goto("http://127.0.0.1:8000/single-product1/1/1")

    # Select the first available color
    first_color_button = page.locator(".color-btn").first
    first_color_button.click()

    # Select the first available size
    first_size_button = page.locator(".size-btn:not([disabled])").first
    first_size_button.click()

    # Click the "Add to Cart" button
    page.locator("text=Add to Cart").first.click()

    # Wait for the cart count to be updated
    expect(page.locator("#cart-count")).to_have_text("1")

    # Take a screenshot
    page.screenshot(path="jules-scratch/verification/verification.png")

    browser.close()

with sync_playwright() as playwright:
    run(playwright)
