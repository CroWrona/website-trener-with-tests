import { test, expect, Page } from '@playwright/test';
import { baseUrl, pagePaths } from '../data/paths';
import { expectedLinks, expectedText } from '../data/bottomRightContainer';

test.beforeEach(async ({ page }) => {
    await page.goto(pagePaths.home);
    await page.waitForSelector('.bottom-right-container', { state: 'visible' });
  });

test('should display close button in bottom right container', async ({ page }) => {
    await page.waitForFunction(() => {
        const bottomRightContainer = document.querySelector('.bottom-right-container');
        if (!bottomRightContainer) return false;
        const opacity = window.getComputedStyle(bottomRightContainer).getPropertyValue('opacity');
        return opacity === '1';
    });
    
    const bottomRightContainer = await page.$('.bottom-right-container');
    const closeButton = await page.$('.close-button');

    expect(closeButton).toBeTruthy();
    await closeButton?.click();
    await page.waitForTimeout(2000);
    
    const opacity = await bottomRightContainer?.evaluate(el => window.getComputedStyle(el).getPropertyValue('opacity'));
    expect(opacity).toBe('0');
});

test('should display elements in bottom right container and correct href attribute for each link', async ({ page }) => {
    const consultationText = await page.$eval('.bottom-right-content p', el => el.textContent);
    expect(consultationText).toContain(expectedText.consultationText);

    const contactButton = await page.$('.bottom-right-container a.contact-button');
    const contactButtonText = await contactButton?.innerText();
    const contactButtonHref = await contactButton?.getAttribute('href');
    expect(contactButtonText).toContain(expectedText.contactText);
    expect(contactButtonHref).toBe(expectedLinks.href);
});
