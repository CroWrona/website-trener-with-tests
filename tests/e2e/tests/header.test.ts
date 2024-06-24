import { test, expect, Page } from '@playwright/test';
import { pagePaths } from '../data/paths';
import { expectedNavLinks, expectedHeaderText, socialIconData } from '../data/header';

test.beforeEach(async ({ page }) => {
    await page.goto(pagePaths.home);
  });

  test('should verify navigation links and texts', async ({ page }) => {
    const navLinks = await page.$$eval('nav a', links => links.map(link => ({
      text: link.textContent?.trim(),
      href: link.getAttribute('href')
    })));

    expect(navLinks).toEqual(expectedNavLinks);
  });

  test('should display correct header text', async ({ page }) => {
    const headerTextH1 = await page.textContent('header h1');
    const headerTextP = await page.textContent('header p');
    expect(headerTextH1).toContain(expectedHeaderText.h1);
    expect(headerTextP).toContain(expectedHeaderText.p);
  });

  test('should display social icons with correct href and class', async ({ page }) => {
    const socialIconsSelector = '.social-icons';
  
    const socialIcons = await page.$(socialIconsSelector);
    expect(socialIcons).toBeTruthy();
  
    for (const icon of socialIconData) {
      const anchor = await socialIcons?.$(`a[href="${icon.href}"]`);
      expect(anchor).toBeTruthy();
  
      const iconClass = await anchor?.$eval('i', node => node.className);
      expect(iconClass).toContain(icon.iconClass);
    }
  });
