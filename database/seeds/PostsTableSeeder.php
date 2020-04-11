<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = [
            [
                'user_id' => 1,
                'category_id' => 3,
                'title' => '5 Tips For Computer Science Students',
                'slug' => '5-tips-for-computer-science-students',
                'body' => 'Whether you’re a computer science student or someone who’s just into the field, you can always improve your skills. Computer science is a tough discipline and it might take some time to see your skills improve. But if you’re just starting out and are seeking to improve your CS skills – you’ve come to the right place. Here are 5 tips you can start incorporating into your daily life as a computer science enthusiast – regardless of your skill level.

1. Note Down Everything

Even though you’ll be probably be working on a computer most of the time – notetaking is still an important habit. You learn better this way and remember more as well. So, the next time you’re working on a computer science project, start taking notes. Notes on the goal of the project, your actual code (writing down the code helps you get better too), and what you’re trying to do are all important ways to improve.

2. Work On Side Projects

Speaking of projects, ideally, you should always be coding something on your own as a side project. Whether it be for fun or just as a hobby, side projects are a great distraction from your work, university projects and life in general. If you’re truly passionate about coding, you’ll want to be always learning more about it. So, try to make something fun in your spare time when you’re not doing anything important.

3. The Theory Is Also Important


Coding is only one half of computer science. Math and theory are just as, if not more, important as writing code. Ideally, you should be focusing on all aspects of computer science, not just coding. You need discrete math to figure out complex algorithms and theory to understand how to approach the problem.

4. Study Everything CS Related

The internet has a lot of information for all fields, including computer science. There are countless classes and online courses that are free and can help expand your knowledge. You’re just one Google search away from getting started in CS. Deciding on the right course can be hard, so, be sure to look at the reviews, the instructor’s portfolio and more. What’s great about classes is that you can take your time and code along with the professor of the course. There are usually discussion boards too – so if you have any questions, don’t be afraid to ask and get involved with the community.

5. Experience and Portfolio

At the end of the day, the experience is usually the deciding factor. Once you feel you’ve gained enough CS knowledge, start writing apps, and programs that you can put in your portfolio. This helps your resume and makes you look credible. Computer science projects are a great way to show off your skills to potential employers, so be sure to focus on developing your skills in your spare time. If you’re really serious about getting started in the CS field, having side projects is a great way to stand out amidst the masses.',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'category_id' => 2,
                'title' => '9 CAREER TIPS FOR ENGINEERS',
                'slug' => '9-career-tips-for-engineers',
                'body' => 'Engineers have interesting thoughts running through their brains. They’re tasked with thinking of concepts such as building a safe bridge, creating the perfect vehicle engines, along with designs for products that makes the world run better.


With all of those lofty thoughts running through their heads, here’s a thought that many let slip by: How does an engineer advance their career?

While it all begins with a degree, whether an online degree, or on campus,
if you’re an engineer, and if you wish to take your career to the next level, then consider the following 9 tips that could allow you to earn more while working on more advanced products:

1. Refresh your portfolio

You have one, don’t you? For all of those wonderful projects that you once had floating around your brain, you’ve certainly created products that you’re proud of. Now isn’t the time to be shy about your works. Take a moment to create case studies that makes the results of your creations shine.

And while you’re at it, brush up the standard career marketing tools, such as your resume, your professional social media, your website, and your industry networking groups. Take the time to read about current engineering salaries and what the market is paying for top performers. Networking is more important than ever right now because your network is what will turn the best results in a job search.

2. Chart your course

Okay, so you work in the engineering industry, but what exactly do you want to do? Is there a specific sector that you’d like to concentrate your efforts within? Where do you see yourself in two, five, or ten years?

Just like any other career field, your goals aren’t going to come to pass just because you imagine yourself in a certain space. You owe it to yourself to become very intentional about where you want to end up. You need to create a plan that will lead you towards where you’d like to end up.

3. Improve your skills and education

Are there certification courses you can take? How about classes that fit around your current work schedule? Are there books you could read or webinars you could watch in order to boost your skill set? If so, then engage in everything that will help to lead you further down your path. And be sure to make note of any courses you’ve taken or books you’ve read — annotate these on your resume’s education section.

4. Look for mentoring

You’ll find that you’ll be able to condense the amount of time that it takes you to achieve your career goals when you seek out the wisdom and the experience of an industry mentor.

Ideally, your industry mentor should be someone you and others respect. They should also respect you, and they should have a genuine interest in wanting to see you achieve your career goals. A good mentor can offer great advice on an engineering job based on experience.

5. Keep networking

There’s a saying: Your network determines your net worth. Did you know that up to 80% of new job positions are obtained by job seekers, thanks to the strength of their professional network?

6. Improve your soft skills

Engineers place a premium on their technical skills, but more firms are looking for engineers who also have attractive soft skills. These include communication, problem-solving, intuition, and more.

7. Ask for opportunities to prove yourself

If you hope to stay with your same company, then the best way to prove yourself is to ask for opportunities to step up and prove your increased worth. Take on assignments that are above your pay grade. If you can achieve these things for free, then you can be trusted with more responsibility at a higher pay scale.

8. Become an industry thought leader

Did you know that by starting a blog or by seeking out public speaking engagements, you’ll start branding yourself as an industry expert? Not only this, but you might find that higher-paying opportunities will start coming to you.

9. Improve your business skills

Above and beyond specific industry skills, it serves you well to develop skills that allow you to understand how to run and operate a business. You might need these one day.',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        ];

        DB::table('posts')->insert($posts);
    }
}
