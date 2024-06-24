import { test, expect } from '@playwright/test';
import { pagePaths } from '../data/paths';
import { expectedFooter } from '../data/footer';

test('should display footer with correct content and links', async ({ page }) => {
  await page.goto(pagePaths.home);

  await page.evaluate(() => {
    window.scrollTo(0, document.body.scrollHeight);
  });

  const footerSelector = 'footer#footer';

  const expectedCopyrightText =expectedFooter.copyrightText;
  const expectedEmailHref = expectedFooter.emailHref;
  const expectedPhoneNumber = expectedFooter.phoneNumber;

  const footer = await page.$(footerSelector);
  expect(footer).toBeTruthy();

  const copyrightText = await footer?.$eval('p', node => node.innerText);
  expect(copyrightText).toContain(expectedCopyrightText);

  const emailLink = await footer?.$(`a[href="${expectedEmailHref}"]`);
  expect(emailLink).toBeTruthy();

  const phoneNumberLink = await footer?.$(`a[href="${expectedPhoneNumber}"]`);
  expect(phoneNumberLink).toBeTruthy();

  const termsOfServiceLink = await footer?.$(`.col.text-right a[href="terms_of_service.php"]`);
  expect(termsOfServiceLink).toBeTruthy();

  const privacyPolicyLink = await footer?.$(`.col.text-right a[href="privacy_policy.php"]`);
  expect(privacyPolicyLink).toBeTruthy();
});
