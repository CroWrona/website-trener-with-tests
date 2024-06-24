import { test, expect } from '@playwright/test';
import { pagePaths } from '../data/paths';
import { blog_post } from '../data/blog';
import { BlogPage,BlogIdPage } from '../pages/blog.page';

for(let i =0; i < blog_post.length; i++)
test(`${i}. blog post id:${blog_post[i].id} title:${blog_post[i].title}`, async ({ page }) => {
    const blogIdPage = new BlogIdPage(page);
    await blogIdPage.loadPost(blog_post[i].blogType, blog_post[i].id)
    await blogIdPage.verifyTitle(blog_post[i].title)
    await blogIdPage.verifyContent(blog_post[i].content)
    await blogIdPage.verifyDate(blog_post[i].blogType, blog_post[i].date)
    await blogIdPage.verifyImage(blog_post[i].image)
});

const arrayPost = [1, 2, 6, 7, 8];
for (let i = 0; i < arrayPost.length; i++)
test(`${i}. blog post verification id:${arrayPost[i]}`, async ({ page }) => {
    await page.goto(pagePaths.blog);

    const posts = await page.locator('.post').count();
    expect(posts).toBe(arrayPost.length);
        const postId = arrayPost[i];

        const blogPage = new BlogPage(page);
        await blogPage.verifyTitle(blog_post[postId - 1].title, i+1);
        await blogPage.verifyShortContent(blog_post[postId - 1].shortContent, i+1);
        await blogPage.verifyDate(blog_post[postId - 1].blogType, blog_post[postId - 1].date, i+1);
        await blogPage.verifyImage(blog_post[postId - 1].image, i+1);
});
