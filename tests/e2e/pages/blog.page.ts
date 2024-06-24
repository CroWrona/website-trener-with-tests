import { test, expect } from '@playwright/test';
import { pagePaths } from '../data/paths';

export class BlogPage {
    constructor(private page: any) {}

    async verifyTitle(expectedTitle: string, nth:number) {
        const title = await this.page.locator(`.post:nth-of-type(${nth}) .blog-title`).innerText();
        expect(title).toBe(expectedTitle);
      }

      async verifyShortContent(expectedContent: string, nth: number) {
        const content = await this.page.locator(`.post:nth-of-type(${nth}) .blog-content`).innerText();
        expect(content).toContain(expectedContent);
    }
    
      async verifyDate(blogType:string, expectedDate: string | null, nth:number) {
        if(blogType === 'blog_single') {
          const date = await this.page.locator(`.post:nth-of-type(${nth}) .blog-date`).innerText();
          expect(date).toBe(expectedDate);
        } else {
          const dateElement = await this.page.locator(`.post:nth-of-type(${nth}) .blog-date`);
          await expect(dateElement).toBeHidden();
        }
      }

      async verifyImage(expectedImage: string | null, nth:number) {
        if (expectedImage) {
          const image = await this.page.locator(`.post:nth-of-type(${nth}) .blog-image`);
          await expect(image).toBeVisible({ timeout: 10000 });
          const imagePath = await image.getAttribute('src');
          expect(imagePath).toBe(expectedImage);
        } else {
          const image = await this.page.locator(`.post:nth-of-type(${nth}) .blog-image`);
          await expect(image).toBeHidden();
        }
      }
}

export class BlogIdPage {
  constructor(private page: any) {}

  async loadPost(blogType:string, postId: string|number) {
    await this.page.goto(pagePaths.home+blogType+'.php?id='+postId);
  }

  async verifyTitle(expectedTitle: string) {
    const title = await this.page.locator('.blog-title').innerText();
    expect(title).toBe(expectedTitle);
  }

  async verifyContent(expectedContent: string) {
    const content = await this.page.locator('.blog-content').innerText();
    expect(content).toBe(expectedContent);
  }

  async verifyDate(blogType:string, expectedDate: string | null) {
    if(blogType === 'blog_single') {
      const date = await this.page.locator('.blog-date').innerText();
      expect(date).toBe(expectedDate);
    } else {
      const dateElement = await this.page.locator('.blog-date');
      await expect(dateElement).toBeHidden();
    }
  }

  async verifyImage(expectedImage: string | null) {
    if (expectedImage) {
      const image = await this.page.locator('.blog-image');
      await expect(image).toBeVisible({ timeout: 10000 });
      const imagePath = await image.getAttribute('src');
      expect(imagePath).toBe(expectedImage);
    } else {
      const image = await this.page.locator('.blog-image');
      await expect(image).toBeHidden();
    }
  }
}