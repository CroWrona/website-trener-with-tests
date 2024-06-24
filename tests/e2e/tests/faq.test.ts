import { test, expect } from '@playwright/test';
import { pagePaths } from '../data/paths';
import { faqs } from '../data/faqs';

test('should display FAQ section with questions and answers', async ({ page }) => {
  await page.goto(pagePaths.faq);

  await page.waitForSelector('.faq');

  const questions = await page.$$('.faq .question');

  const expectedQuestionsCount = faqs.length;

  expect(questions.length).toBe(expectedQuestionsCount);

  for (let i = 0; i < expectedQuestionsCount; i++) {
    const question = questions[i];
    const questionText = await question.$eval('h3', node => node.innerText.trim());
    const answerText = await question.$eval('p', node => node.innerText.trim());

    expect(questionText).toBe(faqs[i].question);
    expect(answerText).toBe(faqs[i].answer);
  }
});
