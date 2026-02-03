<?php
/**
 * Content Migration Script
 * Creates team members, blog posts, and populates the About page.
 * Run via: docker exec zelligcare-wordpress-wordpress-1 php /tmp/migrate-content.php
 */

require '/var/www/html/wp-load.php';

// ============================================
// TEAM MEMBERS
// ============================================

// Helper: create or update team member
function create_team_member($slug, $title, $position, $credentials, $content, $menu_order, $headshot = '') {
    $existing = get_page_by_path($slug, OBJECT, 'team_member');
    if ($existing) {
        $id = $existing->ID;
        wp_update_post(array(
            'ID' => $id,
            'post_title' => $title,
            'post_content' => $content,
            'post_status' => 'publish',
        ));
        echo "UPDATED: Team member '$title' (ID: $id)\n";
    } else {
        $id = wp_insert_post(array(
            'post_type' => 'team_member',
            'post_title' => $title,
            'post_name' => $slug,
            'post_content' => $content,
            'post_status' => 'publish',
            'menu_order' => $menu_order,
        ));
        echo "CREATED: Team member '$title' (ID: $id)\n";
    }

    if ($id && !is_wp_error($id)) {
        update_post_meta($id, 'team_position', $position);
        update_post_meta($id, 'team_credentials', $credentials);
        update_post_meta($id, 'team_display_homepage', '1');
        if (!empty($headshot)) {
            update_post_meta($id, 'team_headshot', $headshot);
        }
    }
    return $id;
}

// Kaye Capin
create_team_member(
    'kaye',
    'Kaye Capin',
    'Operations Manager',
    '',
    '<p>An engineer by training, Kaye brings structure and precision to the heart of Zellig\'s work. She oversees the internal processes that keep the practice running—coordinating the moving parts that connect patients, providers, and systems behind the scenes.</p>

<p>Her role ensures that everything functions not only consistently and efficiently, but with a mindset of continuous improvement. Through her work, Zellig stays responsive, organized, and built for long-term impact.</p>',
    1,
    'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Homepage_Assets/kaye_headshot.png'
);

// Sade Savage
create_team_member(
    'sade-savage',
    'Sade Savage',
    'Physician Assistant',
    'PA-C, DMSc, CAQ-Psychiatry',
    '<p><strong>Fellowship Trained. Doctorally Prepared. Accepting Patients Now.</strong></p>

<p>Sade\'s journey in psychiatry reflects exceptional experience and genuine compassion. She began her career as a mental health technician in the U.S. Air Force, later completing physician assistant training through the highly selective Interservice Physician Assistant Program. To deepen her specialization, she pursued a full-time postgraduate psychiatry fellowship, then went on to earn a doctoral degree from Rocky Mountain State University in 2023. Her advanced training was formally recognized with a Certificate of Added Qualifications (CAQ) in psychiatry.</p>

<p>Most recently, Sade served as Deputy Director of Behavioral Health Operations for the U.S. Air Force, where she led system-wide improvements and cared for thousands of patients each year.</p>

<p>At Zellig, Sade is known for her calm, thoughtful presence and her ability to truly listen. Patients describe her care as warm, thorough, and insightful—an experience that reflects her commitment to understanding each individual.</p>',
    2,
    'https://static.royacdn.com/Site-656e9e6e-f19a-4ed1-9c29-85197594446c/Homepage_Assets/sade_headshot.png'
);

// ============================================
// BLOG POSTS
// ============================================

// Helper: create or update blog post
function create_blog_post($slug, $title, $content, $excerpt, $date) {
    $existing = get_page_by_path($slug, OBJECT, 'post');
    if ($existing) {
        $id = $existing->ID;
        wp_update_post(array(
            'ID' => $id,
            'post_title' => $title,
            'post_content' => $content,
            'post_excerpt' => $excerpt,
            'post_status' => 'publish',
            'post_date' => $date,
            'post_date_gmt' => get_gmt_from_date($date),
        ));
        echo "UPDATED: Post '$title' (ID: $id)\n";
    } else {
        $id = wp_insert_post(array(
            'post_type' => 'post',
            'post_title' => $title,
            'post_name' => $slug,
            'post_content' => $content,
            'post_excerpt' => $excerpt,
            'post_status' => 'publish',
            'post_date' => $date,
            'post_date_gmt' => get_gmt_from_date($date),
        ));
        echo "CREATED: Post '$title' (ID: $id)\n";
    }
    return $id;
}

// Post 1: Psychiatry in Fifteen Minutes
create_blog_post(
    'psychiatry-15-minute-visits',
    'Psychiatry in Fifteen Minutes Isn\'t Psychiatry',
    '<p>The nurse cuffs the arm. "Any side effects?" A nod, a shrug, the clock. Thirteen minutes later the portal pings: refill sent. If this feels like psychiatry, it\'s only because we\'ve lowered the bar.</p>

<h3>The Problem with Speed</h3>

<p>Fifteen-minute medication checks have become standard not through clinical design but through financial incentives. Billing codes reward velocity, managed care systems prioritize throughput, and clinics scale accordingly. When every visit is compressed, psychiatry turns into medication management with a stethoscope cameo.</p>

<p>The economics are clear: a psychiatrist billing four 15-minute visits earns more than one 60-minute evaluation. Over a full day, the math compounds. Practices under pressure adopt the model not because it produces better outcomes but because it produces faster revenue. The patient\'s complexity, meanwhile, doesn\'t shrink to fit the slot.</p>

<h3>What Gets Lost</h3>

<p>The rushed model eliminates critical elements of psychiatric care: understanding where symptoms originated, recognizing patterns that develop over weeks and months, and building the kind of trust that allows patients to share sensitive information. Real diagnostic work suffers—an untreated thyroid condition gets misdiagnosed as depression, a stimulant dose effect gets missed, sleep apnea remains undetected beneath a blanket of fatigue.</p>

<p>Beyond clinical errors, patients learn to self-edit. When the clock is visible and the visit feels like a transaction, people present curated versions of their lives rather than full stories. The information a psychiatrist most needs—the things patients hesitate to say—requires time and safety to surface. A 15-minute visit rarely provides either.</p>

<h3>What Real Psychiatry Requires</h3>

<p>Quality psychiatric care demands patience and curiosity, not just prescriptions. Appointments should match clinical complexity rather than spreadsheets. A thorough follow-up includes timeline anchoring—understanding what has changed and why—medication history review, sleep screening, investigation of medical flags, and at least one concrete therapeutic intervention beyond adjusting a dose.</p>

<p>This doesn\'t mean every visit needs to be an hour. It means the length should serve the patient, not the schedule. Some follow-ups genuinely require only 20 minutes; others need 45. The difference between good care and assembly-line care is the willingness to let the clinical picture determine the pace.</p>

<h3>The Access Defense</h3>

<p>The most common justification for brief visits is access: more patients seen means more patients served. On its face, this seems reasonable. But access without adequacy is a mirage. A patient who is seen for 15 minutes, misdiagnosed, and given the wrong medication hasn\'t received access to care—they\'ve received access to a prescription pad.</p>

<p>A tiered approach serves outcomes far better than maximal compression. Longer appointments when diagnoses are unclear or symptoms are evolving; shorter visits once a patient is stable and the treatment plan is working. This isn\'t luxury medicine—it\'s logical medicine, and it results in fewer emergency visits, fewer medication changes, and better long-term stability.</p>

<h3>Zellig\'s Model</h3>

<p>At Zellig, we build our practice around adequate time by design. We protect longer visits for comprehensive evaluations and allow follow-ups to flex based on clinical need. We believe that when a psychiatrist has the time to think, listen, and respond thoughtfully, the entire trajectory of a patient\'s care improves. Psychiatry in 15 minutes isn\'t psychiatry—it\'s triage dressed up as treatment. We choose to do it differently.</p>',
    'The nurse cuffs the arm. "Any side effects?" A nod, a shrug, the clock. Thirteen minutes later the portal pings: refill sent. If this feels like psychiatry, it\'s only because we\'ve lowered the bar.',
    '2025-10-03 09:00:00'
);

// Post 2: Why Anxiety Feels Worse at Night
create_blog_post(
    'why-anxiety-is-worse-at-night',
    'Why Anxiety Feels Worse at Night',
    '<p>Many people with anxiety notice a striking pattern: the very time that should bring peace and restoration often brings the opposite. The day ends, the house quiets, and suddenly the mind speeds up, replaying conversations, imagining worst-case scenarios, or racing through unfinished tasks. It is a familiar experience, and if you have ever asked yourself why anxiety feels worse at night, you are far from alone.</p>

<p>The first reason lies in how the body regulates stress across the day. Cortisol, our primary stress hormone, naturally peaks in the morning to help us wake and then tapers down toward evening. For people prone to anxiety, however, this rhythm can be disrupted. Instead of winding down, the nervous system misreads cues and remains in high alert. Add to this the rising influence of melatonin, which prepares the body for rest, and you get a mismatch: the body seeks calm while the mind resists it, producing the sensation of being wired when you most want to sleep.</p>

<p>Another factor is the way daily stress accumulates. Most people spend their days managing dozens of small frustrations and tasks—emails, phone calls, traffic, interactions with coworkers or family. During the busyness of daylight, these stressors may not feel overwhelming. Yet once distractions fall away, the weight of the day surfaces. Thoughts that were quiet in the background during meetings or errands expand in the stillness of night. What felt manageable when you were busy can feel enormous when there is nothing else to focus on. The body mirrors this too. Caffeine or alcohol, skipped meals, and muscle tension collected over the day make it harder to settle down, so by bedtime both mind and body are primed for restlessness.</p>

<p>Psychological habits also intensify at night. People who lean toward perfectionism often find themselves reviewing the day\'s performance as if on trial—what went wrong, what could have been said differently, what might others think. Others focus on the future, spinning through "what if" scenarios about the next day or the next year. In the quiet, without friends, colleagues, or even the presence of other people to provide reality checks, the inner critic becomes louder. Even darkness itself can serve as a trigger, stripping away external cues and leaving the mind to fill gaps with its own fears.</p>

<p>The connection between anxiety and sleep adds another layer. Anxiety disrupts sleep by making it harder to fall asleep or stay asleep. Poor sleep then worsens anxiety the next day, raising stress hormones and making the brain more reactive. Even one restless night can heighten worry, and over time this feedback loop becomes self-sustaining: anxiety fuels insomnia, and insomnia fuels anxiety. Many people blame themselves for not being able to "just relax," but in truth a biological cycle is at work that often requires deliberate strategies to interrupt.</p>

<p>Breaking that cycle is possible. Creating a wind-down routine that signals to the body it is safe to rest can be powerful—dimming lights, putting away screens, and repeating calming activities each night. Offloading worries into a journal reduces the urge to mentally rehearse them. Avoiding stimulants and alcohol in the evening prevents the nervous system from staying activated long after bedtime. Relaxation techniques such as slow breathing, muscle relaxation, or guided imagery can shift the body into its parasympathetic mode, lowering heart rate and tension. And when nighttime anxiety is frequent or severe, seeking professional help matters. Evidence-based therapies, medication when appropriate, and integrative approaches that look at the whole person—not just symptoms—can make nights manageable again.</p>

<p>The truth is that anxiety at night is not a personal weakness. It is a predictable interaction of biology, psychology, and the accumulation of daily stress. Understanding that pattern can replace self-blame with compassion and give direction to change. With the right support and tools, evenings can become less about dread and more about restoration. At Zellig, we see anxiety as part of a broader picture of health, and our goal is always to go beyond symptoms—working with patients to understand their experiences deeply and create individualized care that restores balance. Nighttime anxiety may be common, but with care, it does not have to define your nights.</p>',
    'Many people with anxiety notice a striking pattern: the very time that should bring peace and restoration often brings the opposite.',
    '2025-10-03 10:00:00'
);

// Post 3: Insurance and Psychiatry
create_blog_post(
    'insurance-psychiatry-access',
    'The Hidden Struggle of Using Insurance for Mental Health Care',
    '<p>If you\'ve tried to use insurance for psychiatry, you already know what "coverage" can look like in real life: a directory full of ghosts, numbers that ring to nowhere, clinics that quietly left a panel years ago, and staff who kindly explain they\'re full through next season. You start with the number on your card and finish hours later with a page of crossed-out names and nothing booked, which is demoralizing when the whole point was to feel better, not more defeated.</p>

<p>Even when you do land an appointment, the process behind the scenes rarely resembles the clean abstractions in benefit brochures. Claims ricochet through clearinghouses, prior authorizations stall, and the money owed to practices moves like cold molasses. In 2024 a single clearinghouse outage froze revenue for tens of thousands of clinics, forcing teams to re-enter claims by hand while rent, payroll, and medication management continued without pause. "In network" reads like a promise; on the ground, it often behaves like a maze.</p>

<p>Denials turn the maze into a grind. Patients imagine a clinician reading their chart and deciding, with judgment and context; increasingly, the first pass is software built to move decisions at machine speed, rejecting in seconds what took hours to document. Families discover this only when a letter arrives with language opaque enough to feel like satire: medical necessity affirmed in one sentence and unmade in the next, requests for information already provided, deadlines that expire while you wait for a portal message to open. Add "ghost networks" that regulators keep catching—lists riddled with wrong numbers, closed practices, and prescribers who left years ago—and you get the quiet truth behind so many failed searches: on paper there\'s access, by phone there isn\'t. Every no has a human cost. Treatment plans stall. Symptoms stretch across another month. People who finally reached out start to wonder if the effort was a mistake.</p>

<p>Even when payment does arrive, it can move in reverse. Practices receive "overpayment" notices months after the fact—clawbacks that pull revenue off the ledger long after care was delivered and rent was paid. One large clawback can erase a margin for an entire quarter and turn a stable clinic into one that is suddenly negotiating with landlords and halting hires. Small details compound: portals that crash mid-submission, contradictory instructions from different departments at the same insurer, appeal windows that are too short for the volume of charts requested. Staff who trained to support patient care end up spending days resubmitting claims and writing appeal letters, while phones keep ringing and refills still need attention. It isn\'t bureaucratic theater; it\'s the quiet way a system transfers time, risk, and cash-flow burden onto the clinical side and calls it "process."</p>

<p>The predictable consequence is attrition. Psychiatrists, already in short supply, look at the hours lost to denials, recoupments, directory inaccuracies, and multi-month payment delays, then look at the financial reality of running a safe, attentive practice, and decide to step off panels. That choice is often framed by outsiders as greed; from the inside it is survival—an attempt to practice in a way that still leaves room for thinking, follow-through, and the administrative staff required to do both. The downstream effect for patients is simple and brutal: each departure becomes another dead end in a directory, another week of calls, another person who gives up before care begins.</p>

<p>Zellig lives inside this reality. We know what it costs to stay with insurance: benefits checks that require three calls for a straight answer, prior authorizations that ask for the same document twice, payments that land months late, and sudden recoupments that force a second pass at bookkeeping you already finished. We also know what it costs if we step away: more patients left to the directory lottery, more people weighing rent against cash-pay, more untreated illness accumulating quietly in households that have already carried too much. So we choose the harder path. We stay in network where we can and we carry the administrative load that comes with it. We verify benefits before you sit down. We help navigate prior-auth hoops. We resubmit and appeal when claims go sideways. We set clear expectations about out-of-pocket exposure so a surprise bill doesn\'t become the last straw. It is slower and it is harder, and we do it because access matters in a way spreadsheets can\'t measure.</p>

<p>None of this is a claim that the system is staffed by villains. Most people working inside insurers are doing their jobs under rules they didn\'t write. But rules shape outcomes. When directories don\'t match reality, when algorithms can deny in seconds what takes weeks to correct, when payments can be pulled back long after care is given, the incentives tilt away from availability and toward attrition. Patients learn to lower expectations. Clinicians learn to harden their schedules. Trust erodes. The fix won\'t come from slogans; it will come from basics done well—accurate networks, timely payments, transparent criteria, and a fair process for dispute that doesn\'t require a second full-time job to access. Until then, our commitment is simple: keep showing up inside the mess, keep doing the paperwork that opens doors for real people, and keep the path to care from collapsing into a search exercise that only the luckiest can finish.</p>

<p>We don\'t pretend this work is glamorous. It is often tedious, sometimes maddening, and always worth the effort when a person who was stuck in loops finally gets through and starts to stabilize. Insurance makes care harder than it should be, but we stay in network because it keeps care reachable for more people. It isn\'t easy, but it\'s necessary—and we\'ll keep doing it.</p>',
    'If you\'ve tried to use insurance for psychiatry, you already know what "coverage" can look like in real life: a directory full of ghosts, numbers that ring to nowhere, clinics that quietly left a panel years ago...',
    '2025-10-03 11:00:00'
);

// Post 4: What to Expect at First Appointment
create_blog_post(
    'what-to-expect-at-your-first-psychiatry-appointment',
    'What to Expect at Your First Psychiatry Appointment',
    '<p>Your first psychiatry appointment isn\'t a test, and it isn\'t a prescription mill. It\'s a structured conversation that translates your story into a practical plan. Most of the time, the first visit focuses on understanding rather than rushing into a diagnosis or medication. Still, many people walk into that first session with anxiety, unsure what will be asked or how much to share. Knowing what actually happens can take much of the pressure off.</p>

<p>A psychiatrist\'s primary goal in the first meeting is to understand you in context—who you are, what brought you in, and what your goals are. The visit typically lasts between 45 and 75 minutes, longer than standard follow-ups, because there\'s more ground to cover. You\'ll start with what prompted you to seek help: when your symptoms began, how they\'ve changed over time, and how they affect daily life. This part often feels like telling your story in detail, which can be surprisingly relieving.</p>

<p>From there, the psychiatrist will ask about your medical history, current medications, and family background. This isn\'t about prying; it\'s about making sure any treatment recommendations fit you safely and effectively. Lifestyle factors such as sleep, exercise, substance use, or major stressors are often part of this conversation. At some point, the psychiatrist will also complete what\'s called a <em>mental status examination</em>. This isn\'t a quiz—it\'s the clinician\'s way of noting how you think, feel, and focus during the session. To you, it may just feel like part of the normal back-and-forth.</p>

<p>Patients often expect medication immediately, but that\'s not always the case. A first visit is more likely to outline possible approaches—therapy, lifestyle adjustments, labs, and sometimes medication—rather than rushing into a final plan. Immediate prescriptions, especially controlled substances, are uncommon on day one. The goal is to make a thoughtful start, not to hand you a pill without context.</p>

<p>To make the most of the visit, it helps to bring a few things with you: a list of your current medications and doses (including supplements), notes on past medications and how you responded, details on any allergies or medical conditions, and your top three goals for care. You might also jot down key questions you\'d like answered. This doesn\'t have to be exhaustive—just enough to ground the conversation and ensure nothing important is forgotten.</p>

<p>What happens after that first appointment is just as important. Usually, you\'ll leave with a shared understanding of your concerns, a working plan, and clear next steps. That might include a follow-up visit in two to four weeks, a referral to a therapist, or lab orders if needed. You should know exactly how to reach your clinician between appointments, what to do if you experience side effects, and how refills will be handled. A good psychiatrist ensures you don\'t walk out with uncertainty about what comes next.</p>

<p>By the end of a first psychiatry appointment, you should feel like a partner in the process—not a case file. At Zellig, we believe this visit should set the tone for a collaborative relationship built on trust, compassion, and clarity. It\'s the beginning of care, not a verdict, and it should leave you with a sense of direction and hope.</p>

<h3>Frequently Asked Questions</h3>

<p><strong>Do psychiatrists prescribe medication at the first appointment?</strong><br>
Sometimes, but not always. The first visit usually emphasizes understanding your history and goals. If medication is appropriate, options are discussed.</p>

<p><strong>What questions will I be asked?</strong><br>
Expect questions about symptoms, timing, daily impact, past treatments, medical history, and support systems.</p>

<p><strong>How long does it take?</strong><br>
Initial evaluations typically last 45–75 minutes.</p>

<p><strong>How should I prepare?</strong><br>
Bring a list of medications and doses, past medication responses, allergies, and your top goals for treatment.</p>',
    'Your first psychiatry appointment isn\'t a test, and it isn\'t a prescription mill. It\'s a structured conversation that translates your story into a practical plan.',
    '2025-10-03 12:00:00'
);

// Delete the default "Hello world!" post
$hello = get_page_by_path('hello-world', OBJECT, 'post');
if ($hello) {
    wp_delete_post($hello->ID, true);
    echo "DELETED: 'Hello world!' post\n";
}

// ============================================
// ABOUT PAGE
// ============================================
$about = get_page_by_path('about');
if ($about) {
    wp_update_post(array(
        'ID' => $about->ID,
        'post_content' => '<p>Too often, mental health care is reduced to rushed visits, checklist symptoms, and profit-driven decisions. Many practices are run with little regard for patients or the clinicians providing care. Appointments are cut short, staff are treated as expendable, and the result is predictable: patients get less than they deserve.</p>

<p>Zellig was created as a response. We bring together the best providers, give them the time and support they need, and create an environment where their work is respected. When clinicians are valued, patients feel the difference.</p>

<p>We also aim to offer the full spectrum of mental-health care—psychiatry, counseling, and beyond—delivered in a setting that looks at patients as whole people, not just medication lists or symptom checkboxes. Our integrative approach means we go further to understand each individual and craft treatment plans in true collaboration.</p>

<p>Zellig is built on the idea that when care is thoughtful, unrushed, and grounded in respect for both patients and clinicians, the results are better for everyone.</p>',
    ));
    echo "OK: About page (ID: {$about->ID}) content updated.\n";
} else {
    echo "WARNING: About page not found.\n";
}

echo "\nContent migration complete.\n";
