# Supermetrics Assignment

Code test assignment for

## Task Rquirements

Register a short-lived token on the fictional Supermetrics Social Network REST API

2. Fetch the posts of fictional users on a fictional social platform and process their posts.
3. You will have 1000 posts over a six month period.
4. Show stats on the following:
a. - Average character length of posts per month
b. - Longest post by character length per month
c. - Total posts split by week number
d. - Average number of posts per user per month
5. Design your thinking and code to be generic, extendable, easy to maintain by other staff
members while thinking about performance.
You do not need to create any HTML pages for the display of the data. JSON output of the
stats is sufficient.

## Usage

Set up the PHP project with WAMP/XAMPP, etc. and simply navigate to
```
/index.php?p=home&c=stats&a=index&totalpages=10
```

or
```
/home/stats/index/10
```

to see the statistics of the processed posts. You should see something as follows:

```
{
   "longest_post_in_month":{
      "2021-02":{
         "id":"post601eb64b9a92a_adb3193e",
         "from_name":"Rafael Althoff",
         "from_id":"user_10",
         "message":"disability lodge reveal thick director embark belong initiative indication smell establish market march contraction recognize sailor timetable cover rhythm wrist chaos population market wrist key cherry wake stereotype interest ballet improve banana disability rehabilitation flawed core corn policeman underline story quote bolt scratch herd rage trunk sword format dramatic eye uncle bike fine drama television discount agriculture pot depression banana flow admit save proposal expose charter indication basket state confront falsify march critic dressing reserve migration diameter baby golf monstrous stunning coach tidy orchestra sister charm palm vertical vegetarian umbrella turkey",
         "type":"status",
         "created_time":"2021-02-03T07:08:22+00:00",
         "chars_count":689
      },
      "2021-01":{
         "id":"post601eb64b9ac2e_9fd6bb8b",
         "from_name":"Ethelene Maggi",
         "from_id":"user_18",
         "message":"stunning chain forest follow mail pursuit candle braid death canvas poison district crude transmission pavement systematic full tick quote underline session lost refuse force shout silver chocolate beg effort opposite trench fuel precede speculate pit admit accountant flower flu donor village margin imperial failure transmission pedestrian quotation home falsify population opposite variable dog diplomat horseshoe bat sympathetic formal route tolerate revoke value graphic rough slap monopoly evolution appreciate crash dramatic lip mastermind humanity speech introduction avenue angel church dismissal cheese mastermind access survival pest heal policeman pump sensation accumulation deadly graze excitement horror triangle animal abstract vague reliable memorandum bishop",
         "type":"status",
         "created_time":"2021-01-07T20:18:09+00:00",
         "chars_count":776
      },
      "2020-12":{
         "id":"post601eb64b9aef5_2337e8b4",
         "from_name":"Leonarda Schult",
         "from_id":"user_3",
         "message":"company lie tense trunk overcharge admit abridge beautiful warrant section rider wagon reliance mystery memorandum wake deprive broken shorts pudding modernize contrary egg white treaty theft mystery horseshoe foreigner pillow final gift fill project eagle variant college spend opposite describe rear clearance monkey parachute culture producer charter thin introduction connection bar thick throne evolution speculate romantic division awful program throne candle memorandum jurisdiction lend final date book sound project crop broadcast education absent press reliance egg white electron lodge film awful sample arrow hiccup monstrous mug parachute vague angel whip accident shell trace extraterrestrial awful shaft instal diameter monstrous braid useful",
         "type":"status",
         "created_time":"2020-12-15T09:18:36+00:00",
         "chars_count":757
      },
      "2020-11":{
         "id":"post601eb64b9b115_2682b836",
         "from_name":"Lashanda Small",
         "from_id":"user_12",
         "message":"director rob notice interest eyebrow formula quote hallway digital option contrary smell introduce representative cottage feminine route scandal sanctuary height information fixture interface herb hold litigation interface proposal establish stake mastermind hell far closed steward rally market truth cash queen rise sword situation pardon space delay second agriculture sight recovery dignity reliance due trick graphic loan cope evolution impulse elephant survey expression wreck write slap chocolate angel warrant jewel barrier scandal fame brick despise superintendent snake concession factor depend bother old morning sister mirror vegetarian diamond water coalition reputation herd scream rob makeup stubborn pardon paint route quote generation",
         "type":"status",
         "created_time":"2020-11-27T01:44:36+00:00",
         "chars_count":751
      }
   },
   "average_chars_length_in_month":{
      "2021-02":339,
      "2021-01":391,
      "2020-12":398,
      "2020-11":387
   },
   "total_posts_per_week_number":{
      "2021-02":{
         "Week 1":30,
         "Week 2":0,
         "Week 3":0,
         "Week 4":0,
         "Week 5":0,
         "Week 6":0
      },
      "2021-01":{
         "Week 1":11,
         "Week 2":40,
         "Week 3":37,
         "Week 4":38,
         "Week 5":39,
         "Week 6":5
      },
      "2020-12":{
         "Week 1":26,
         "Week 2":37,
         "Week 3":38,
         "Week 4":39,
         "Week 5":27,
         "Week 6":0
      },
      "2020-11":{
         "Week 1":0,
         "Week 2":12,
         "Week 3":35,
         "Week 4":37,
         "Week 5":39,
         "Week 6":10
      }
   },
   "average_number_of_post_per_user":{
      "2021-02":{
         "user_14":6.67,
         "user_13":3.33,
         "user_5":3.33,
         "user_8":10,
         "user_10":10,
         "user_16":3.33,
         "user_6":3.33,
         "user_11":16.67,
         "user_4":10,
         "user_15":3.33,
         "user_2":6.67,
         "user_9":6.67,
         "user_17":3.33,
         "user_19":3.33,
         "user_7":3.33,
         "user_18":3.33,
         "user_3":3.33
      },
      "2021-01":{
         "user_3":7.65,
         "user_0":4.71,
         "user_5":5.29,
         "user_15":3.53,
         "user_11":4.71,
         "user_2":3.53,
         "user_13":6.47,
         "user_9":7.06,
         "user_14":7.06,
         "user_19":5.88,
         "user_4":3.53,
         "user_12":5.88,
         "user_8":4.71,
         "user_18":4.71,
         "user_1":3.53,
         "user_7":7.06,
         "user_10":2.94,
         "user_17":5.88,
         "user_6":4.12,
         "user_16":1.76
      },
      "2020-12":{
         "user_8":5.39,
         "user_12":7.19,
         "user_18":2.99,
         "user_15":7.19,
         "user_5":3.59,
         "user_1":6.59,
         "user_7":3.59,
         "user_2":5.99,
         "user_4":3.59,
         "user_3":6.59,
         "user_9":4.19,
         "user_19":2.99,
         "user_0":5.99,
         "user_6":4.79,
         "user_13":5.99,
         "user_10":5.39,
         "user_14":6.59,
         "user_16":3.59,
         "user_11":3.59,
         "user_17":4.19
      },
      "2020-11":{
         "user_7":4.51,
         "user_18":4.51,
         "user_2":5.26,
         "user_1":7.52,
         "user_10":4.51,
         "user_14":2.26,
         "user_19":3.76,
         "user_6":10.53,
         "user_0":1.5,
         "user_17":9.02,
         "user_8":3.76,
         "user_11":8.27,
         "user_13":5.26,
         "user_4":6.77,
         "user_12":5.26,
         "user_9":7.52,
         "user_5":2.26,
         "user_15":3.01,
         "user_16":1.5,
         "user_3":3.01
      }
   }
}
```


## Further optimizations and TO-DOs

