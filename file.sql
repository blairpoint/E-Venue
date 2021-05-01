--
-- PostgreSQL database dump
--

-- Dumped from database version 12.5 (Ubuntu 12.5-0ubuntu0.20.04.1)
-- Dumped by pg_dump version 12.5 (Ubuntu 12.5-0ubuntu0.20.04.1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: account; Type: TABLE; Schema: public; Owner: blairuser
--

CREATE TABLE public.account (
    name character varying(40),
    password character varying(25),
    id integer NOT NULL,
    email character varying(255) NOT NULL
);


ALTER TABLE public.account OWNER TO blairuser;

--
-- Name: account_id_seq; Type: SEQUENCE; Schema: public; Owner: blairuser
--

CREATE SEQUENCE public.account_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.account_id_seq OWNER TO blairuser;

--
-- Name: account_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: blairuser
--

ALTER SEQUENCE public.account_id_seq OWNED BY public.account.id;


--
-- Name: chatmachine; Type: TABLE; Schema: public; Owner: blairuser
--

CREATE TABLE public.chatmachine (
    name character varying(40),
    message character varying(400),
    id integer NOT NULL,
    ip character varying(255) NOT NULL,
    "time" character varying NOT NULL
);


ALTER TABLE public.chatmachine OWNER TO blairuser;

--
-- Name: chatmachine_id_seq; Type: SEQUENCE; Schema: public; Owner: blairuser
--

CREATE SEQUENCE public.chatmachine_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.chatmachine_id_seq OWNER TO blairuser;

--
-- Name: chatmachine_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: blairuser
--

ALTER SEQUENCE public.chatmachine_id_seq OWNED BY public.chatmachine.id;


--
-- Name: connection; Type: TABLE; Schema: public; Owner: blairuser
--

CREATE TABLE public.connection (
    connection character varying(40)
);


ALTER TABLE public.connection OWNER TO blairuser;

--
-- Name: events; Type: TABLE; Schema: public; Owner: blairuser
--

CREATE TABLE public.events (
    id integer NOT NULL,
    eventname character varying(255) NOT NULL,
    imagename character varying(255) NOT NULL,
    venuename character varying(255) NOT NULL,
    sdate character varying(255) NOT NULL,
    stime character varying(255) NOT NULL,
    edate character varying(255) NOT NULL,
    etime character varying(255) NOT NULL,
    locdata character varying(255),
    locimage character varying(255)
);


ALTER TABLE public.events OWNER TO blairuser;

--
-- Name: events_id_seq; Type: SEQUENCE; Schema: public; Owner: blairuser
--

CREATE SEQUENCE public.events_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.events_id_seq OWNER TO blairuser;

--
-- Name: events_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: blairuser
--

ALTER SEQUENCE public.events_id_seq OWNED BY public.events.id;


--
-- Name: imagelocs; Type: TABLE; Schema: public; Owner: blairuser
--

CREATE TABLE public.imagelocs (
    id integer NOT NULL,
    eventid integer,
    locdata character varying(255),
    locimage character varying(255),
    created_time timestamp without time zone
);


ALTER TABLE public.imagelocs OWNER TO blairuser;

--
-- Name: imagelocs_id_seq; Type: SEQUENCE; Schema: public; Owner: blairuser
--

CREATE SEQUENCE public.imagelocs_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.imagelocs_id_seq OWNER TO blairuser;

--
-- Name: imagelocs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: blairuser
--

ALTER SEQUENCE public.imagelocs_id_seq OWNED BY public.imagelocs.id;


--
-- Name: taskmachine; Type: TABLE; Schema: public; Owner: blairuser
--

CREATE TABLE public.taskmachine (
    name character varying(40),
    task character varying(400),
    id integer NOT NULL
);


ALTER TABLE public.taskmachine OWNER TO blairuser;

--
-- Name: taskmachine_id_seq; Type: SEQUENCE; Schema: public; Owner: blairuser
--

CREATE SEQUENCE public.taskmachine_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.taskmachine_id_seq OWNER TO blairuser;

--
-- Name: taskmachine_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: blairuser
--

ALTER SEQUENCE public.taskmachine_id_seq OWNED BY public.taskmachine.id;


--
-- Name: timeserver; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.timeserver (
    id integer NOT NULL,
    ip character varying(255) NOT NULL,
    "time" character varying NOT NULL
);


ALTER TABLE public.timeserver OWNER TO postgres;

--
-- Name: timeserver_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.timeserver_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.timeserver_id_seq OWNER TO postgres;

--
-- Name: timeserver_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.timeserver_id_seq OWNED BY public.timeserver.id;


--
-- Name: venues; Type: TABLE; Schema: public; Owner: blairuser
--

CREATE TABLE public.venues (
    id integer NOT NULL,
    venuename character varying(255) NOT NULL,
    thumbname character varying(255) NOT NULL,
    capacity character varying(20) NOT NULL,
    city character varying(255) NOT NULL,
    address character varying(255) NOT NULL,
    fpimagename character varying(255) NOT NULL
);


ALTER TABLE public.venues OWNER TO blairuser;

--
-- Name: venues_id_seq; Type: SEQUENCE; Schema: public; Owner: blairuser
--

CREATE SEQUENCE public.venues_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.venues_id_seq OWNER TO blairuser;

--
-- Name: venues_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: blairuser
--

ALTER SEQUENCE public.venues_id_seq OWNED BY public.venues.id;


--
-- Name: account id; Type: DEFAULT; Schema: public; Owner: blairuser
--

ALTER TABLE ONLY public.account ALTER COLUMN id SET DEFAULT nextval('public.account_id_seq'::regclass);


--
-- Name: chatmachine id; Type: DEFAULT; Schema: public; Owner: blairuser
--

ALTER TABLE ONLY public.chatmachine ALTER COLUMN id SET DEFAULT nextval('public.chatmachine_id_seq'::regclass);


--
-- Name: events id; Type: DEFAULT; Schema: public; Owner: blairuser
--

ALTER TABLE ONLY public.events ALTER COLUMN id SET DEFAULT nextval('public.events_id_seq'::regclass);


--
-- Name: imagelocs id; Type: DEFAULT; Schema: public; Owner: blairuser
--

ALTER TABLE ONLY public.imagelocs ALTER COLUMN id SET DEFAULT nextval('public.imagelocs_id_seq'::regclass);


--
-- Name: taskmachine id; Type: DEFAULT; Schema: public; Owner: blairuser
--

ALTER TABLE ONLY public.taskmachine ALTER COLUMN id SET DEFAULT nextval('public.taskmachine_id_seq'::regclass);


--
-- Name: timeserver id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.timeserver ALTER COLUMN id SET DEFAULT nextval('public.timeserver_id_seq'::regclass);


--
-- Name: venues id; Type: DEFAULT; Schema: public; Owner: blairuser
--

ALTER TABLE ONLY public.venues ALTER COLUMN id SET DEFAULT nextval('public.venues_id_seq'::regclass);


--
-- Data for Name: account; Type: TABLE DATA; Schema: public; Owner: blairuser
--

COPY public.account (name, password, id, email) FROM stdin;
blair   RCUUYQTF        1       blair.robson@gmail.com
neha    RCUUYQTF        3       neha@email.com
raja    RCUUYQTF        4       raja@email.com
juliano RCUUYQTF        5       juliano@email.com
alice   RCUUYQTF        6       alice@email.com
ali     RCUUYQTF        7       ali@email.com
oliver  CDE     9       email@email.com
\.


--
-- Data for Name: chatmachine; Type: TABLE DATA; Schema: public; Owner: blairuser
--

COPY public.chatmachine (name, message, id, ip, "time") FROM stdin;
testuser        hi      2       9.9.9.9 2020-11-06 17:03:35.758825+13
testuser        hello hello hello       3       9.9.9.9 2020-11-06 17:04:30.64682+13
testuser        test    4       9.9.9.9 2020-11-06 17:09:18.101067+13
testuser        huhihihihi      5       9.9.9.9 2020-11-06 17:09:27.440917+13
testuser        mr man  6       9.9.9.9 2020-11-06 17:21:55.519101+13
testuser        mr hi   7       9.9.9.9 2020-11-06 17:30:03.022953+13
testuser        yoza    8       9.9.9.9 2020-11-06 17:31:54.382866+13
testuser        abc     9       9.9.9.9 2020-11-06 17:32:41.214811+13
testuser        yo      10      9.9.9.9 2020-11-06 17:34:05.831808+13
testuser        hello   11      9.9.9.9 2020-11-07 13:00:41.071138+13
testuser        testssss        12      9.9.9.9 2020-11-07 13:03:21.09852+13
testuser        farter  13      9.9.9.9 2020-11-07 13:04:14.339003+13
testuser        trgsre  14      9.9.9.9 2020-11-07 13:06:02.7077+13
testuser        test    15      9.9.9.9 2020-11-09 09:52:29.069097+13
testuser        test    16      9.9.9.9 2020-11-09 09:55:00.623479+13
testuser        hello   17      9.9.9.9 2020-11-09 09:56:14.186336+13
testuser        test    18      9.9.9.9 2020-11-09 10:01:15.206511+13
testuser        test    19      9.9.9.9 2020-11-09 10:01:50.713529+13
testuser        test    20      9.9.9.9 2020-11-09 10:05:04.919743+13
testuser        test    21      9.9.9.9 2020-11-10 09:41:29.815522+13
testuser        Go buy some apples      22      9.9.9.9 2020-11-10 15:21:07.646712+13
testuser        Go buy some apples      23      9.9.9.9 2020-11-10 15:36:31.386668+13
testuser        Go buy some yellow chilli       24      9.9.9.9 2020-11-10 15:38:21.000349+13
testuser        Go buy some yellow chilli       25      9.9.9.9 2020-11-10 15:39:48.765677+13
testuser2       123     26      9.9.9.9 2020-11-10 15:47:59.985805+13
testuser2       buy some food   27      9.9.9.9 2020-11-10 15:53:51.274404+13
testuser2       buy from drink  28      9.9.9.9 2020-11-10 16:08:17.392877+13
testuser2       buy some beer   29      9.9.9.9 2020-11-11 09:38:06.16792+13
testuser2       buy some fruit  30      9.9.9.9 2020-11-11 10:50:49.262113+13
testuser2       write some code 31      9.9.9.9 2020-11-11 13:17:18.59871+13
\.


--
-- Data for Name: connection; Type: TABLE DATA; Schema: public; Owner: blairuser
--

COPY public.connection (connection) FROM stdin;
\.


--
-- Data for Name: events; Type: TABLE DATA; Schema: public; Owner: blairuser
--

COPY public.events (id, eventname, imagename, venuename, sdate, stime, edate, etime, locdata, locimage) FROM stdin;
25      All Blacks vs Australia Caleb-Clarke.jpg        Sky Stadium     10/17/2020      7:30pm  10/17/2020      10pm    \N      \N
26      African Drumming        africandrumming.jpg     Newtown Community Centre        12/02/2020      6pm     12/02/2020      8pm     \N      \N
30      AUM Festival    aum.jpg Leightons Farm  12/30/2020      12pm    01/04/2021      12pm    \N      \N
31      Shapeshifter    shapeshifter2.jpg       TSB Arena       11/21/2020      7pm     11/22/2020      12:30am:        \N      \N
34      Wellington Orchestra    orchestra.jpg   TSB Arena       12/17/2020      12pm    12/16/2020      1pm     \N      \N
35      Splore Festival splorefestthumb.jpg     Tapapkanga Regional Park        02/02/2021      12      12/13/2020      12      \N      \N
36      Luminate Festival       luminatefest.jpg        Canaan Downs    02/08/2021      12pm    02/15/2021      12pm    \N      \N
41      Puppy Exhibition        daschund.jpg    Sky Stadium     12/30/2020      1pm     12/28/2020      2pm     \N      \N
48      How to get Good at Ultimate Frisbee proudly brought to you by Max       Max.JPG Canaan Downs    12/16/2020      1.00pm  12/21/2020      2.00pm  \N  \N
\.


--
-- Data for Name: imagelocs; Type: TABLE DATA; Schema: public; Owner: blairuser
--

COPY public.imagelocs (id, eventid, locdata, locimage, created_time) FROM stdin;
1       15      abcdef  testimage       \N
2       15      abcdef  testimage       \N
3       15      abcdef  testimage       \N
4       15      abcdef  testimage       \N
5       15      abcdef  testimage       \N
6       15      abcdef  testimage       \N
7       15      abcdef  testimage       \N
8       20      grid60  toilet.png      2020-12-01 02:18:54.275621
9       20      grid325 pinmain.jpg     2020-12-01 02:18:55.808884
10      21      grid305 toilet.png      2020-12-01 02:31:06.752131
11      21      grid32  pinmain.jpg     2020-12-01 02:31:10.324583
12      22      grid193 toilet.png      2020-12-01 02:43:17.196776
13      22      grid331 pinmain.jpg     2020-12-01 02:43:19.02507
14      23      grid269 toilet.png      2020-12-01 20:51:30.82826
15      23      grid483 pinmain.jpg     2020-12-01 20:51:33.242622
16      23      grid106 toilet.png      2020-12-01 20:51:36.111033
17      24      grid339 toilet.png      2020-12-01 21:19:52.118415
18      24      grid39  pinmain.jpg     2020-12-01 21:19:55.882962
19      24      grid65  pinmain.jpg     2020-12-01 21:19:58.551408
20      25      grid507 toilet.png      2020-12-01 21:25:06.952655
21      25      grid299 pinmain.jpg     2020-12-01 21:25:12.121333
22      26      grid334 toilet.png      2020-12-01 21:28:50.440049
23      26      grid32  pinmain.jpg     2020-12-01 21:28:53.91051
24      27      grid292 toilet.png      2020-12-01 21:36:17.458937
25      27      grid331 pinmain.jpg     2020-12-01 21:36:20.276253
26      28      grid197 toilet.png      2020-12-01 21:41:38.487037
27      28      grid324 pinmain.jpg     2020-12-01 21:41:40.114285
28      28      grid303 toilet.png      2020-12-01 22:55:45.099799
29      28      grid245 pinmain.jpg     2020-12-01 22:55:46.7841
30      30      grid303 toilet.png      2020-12-02 02:17:02.273747
31      30      grid298 pinmain.jpg     2020-12-02 02:17:04.521069
32      31      grid314 toilet.png      2020-12-02 02:20:53.499902
33      31      grid65  pinmain.jpg     2020-12-02 02:20:56.52336
34      32      grid406 pinmain.jpg     2020-12-02 23:52:08.768516
35      32      grid169 toilet.png      2020-12-02 23:52:13.982353
36      32      grid195 toilet.png      2020-12-02 23:52:16.063473
37      34      grid219 toilet.png      2020-12-03 00:26:41.250075
38      34      grid354 pinmain.jpg     2020-12-03 00:26:42.827256
39      35      grid345 toilet.png      2020-12-03 00:32:53.497213
40      35      grid407 pinmain.jpg     2020-12-03 00:32:56.37268
41      36      grid222 toilet.png      2020-12-03 00:34:07.690098
42      36      grid257 pinmain.jpg     2020-12-03 00:34:09.549453
43      40      grid267 pinmain.jpg     2020-12-03 00:59:22.924424
44      40      grid65  toilet.png      2020-12-03 00:59:24.797609
45      41      grid168 toilet.png      2020-12-03 01:02:38.240222
46      41      grid216 pinmain.jpg     2020-12-03 01:02:40.659305
47      42      grid299 toilet.png      2020-12-03 01:05:15.886955
48      42      drag2   pinmain.jpg     2020-12-03 01:05:20.779432
49      42      grid245 toilet.png      2020-12-03 01:05:24.398402
50      42      grid301 toilet.png      2020-12-03 01:05:34.705192
51      43      grid219 toilet.png      2020-12-03 01:07:59.186468
52      43      grid223 toilet.png      2020-12-03 01:08:02.438339
53      43      grid276 toilet.png      2020-12-03 01:08:05.228855
54      43      grid302 toilet.png      2020-12-03 01:08:07.227209
55      43      grid327 toilet.png      2020-12-03 01:08:09.525302
56      43      grid352 toilet.png      2020-12-03 01:08:12.524112
57      43      grid350 toilet.png      2020-12-03 01:08:14.66147
58      43      grid323 toilet.png      2020-12-03 01:08:16.648795
59      43      grid296 toilet.png      2020-12-03 01:08:18.974582
60      43      grid269 toilet.png      2020-12-03 01:08:21.301061
61      44      grid141 toilet.png      2020-12-03 01:14:59.768068
62      44      grid302 pinmain.jpg     2020-12-03 01:15:01.865045
63      46      grid272 pinmain.jpg     2020-12-03 01:20:01.406929
64      46      grid280 toilet.png      2020-12-03 01:20:03.182555
65      48      grid359 toilet.png      2020-12-03 01:23:54.172931
66      48      grid248 pinmain.jpg     2020-12-03 01:23:57.829688
\.


--
-- Data for Name: taskmachine; Type: TABLE DATA; Schema: public; Owner: blairuser
--

COPY public.taskmachine (name, task, id) FROM stdin;
ali     IQcHQTcCcTWP    50
blair   OCMGcFKPPGT     51
blair   OCMGcFKPPGT     52
blair   OCMGcUQOGcVQCUV 53
blair   DCMGcUQOGcHQQF  54
blair   HNacCcMKVG      55
blair   HNacCcMKVG      56
blair   FQcCcVJKPI      57
blair   FTKPMcUQOGcDGGT 58
blair   HNacCcMKVG      59
neha    GCVcHQQF        60
vane    EWFFNGcOacDQaHTKGPF     61
vane    GCVcRKbbC       62
ali     FTKPMcUQOGcYCVGT        63
ali     CNKccc  64
neha    PGJCccc 65
jack    LCEMccc 66
raja    TCLCccc 67
sophie  UQRJKGccc       68
sophie  IQVQcUEJQQN     69
sophie  IQVQcUEJQQNcccc 70
blair   GCVcUQOGcHQQF   71
blair   VGUV    72
blair   UCXGcCcVJKPI    73
blair   TKFGcCcDKMG     74
oliver  FTKPMcUQOGcDGGT 75
blair   FQcCcVJKPIcKPcVJGcENQWF 76
blair   IQVQcVJGcDGCEJ  77
blair   IQVQcVJGcDGCEJ  78
\.


--
-- Data for Name: timeserver; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.timeserver (id, ip, "time") FROM stdin;
1       0.0.0.0 2020-11-05 08:29:26.781768+00
\.


--
-- Data for Name: venues; Type: TABLE DATA; Schema: public; Owner: blairuser
--

COPY public.venues (id, venuename, thumbname, capacity, city, address, fpimagename) FROM stdin;
10      Newtown Community Centre        newtown.jpg     400     Wellington      Colombo Street  newtownfloorplan.png
11      TSB Arena       tsbarena.jpg    5655    Wellington      Queens Wharf    tsbfloorplan.png
14      Sky Stadium     skystadiumthumb.jpg     50,000  Wellington      105 Waterloo Quay, Pipitea, Wellington  skystadiumfloor.png
16      Tapapkanga Regional Park        splorefest.jpg  90,000  Auckland        95 Deerys Road, Orere Point     tapapakanga2.JPG
17      Leightons Farm  wilsons-rd2.jpg 70,000  Auckland        Wilsons Road, South Head        aumfloorplan.png
18      Canaan Downs    canaandowns.jpg 35,000  Abel Tasman National Park       Takaka Hill     canaandown-floorplan.JPG
\.


--
-- Name: account_id_seq; Type: SEQUENCE SET; Schema: public; Owner: blairuser
--

SELECT pg_catalog.setval('public.account_id_seq', 9, true);


--
-- Name: chatmachine_id_seq; Type: SEQUENCE SET; Schema: public; Owner: blairuser
--

SELECT pg_catalog.setval('public.chatmachine_id_seq', 31, true);


--
-- Name: events_id_seq; Type: SEQUENCE SET; Schema: public; Owner: blairuser
--

SELECT pg_catalog.setval('public.events_id_seq', 48, true);


--
-- Name: imagelocs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: blairuser
--

SELECT pg_catalog.setval('public.imagelocs_id_seq', 66, true);


--
-- Name: taskmachine_id_seq; Type: SEQUENCE SET; Schema: public; Owner: blairuser
--

SELECT pg_catalog.setval('public.taskmachine_id_seq', 78, true);


--
-- Name: timeserver_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.timeserver_id_seq', 1, false);


--
-- Name: venues_id_seq; Type: SEQUENCE SET; Schema: public; Owner: blairuser
--

SELECT pg_catalog.setval('public.venues_id_seq', 18, true);


--
-- Name: account account_pkey; Type: CONSTRAINT; Schema: public; Owner: blairuser
--

ALTER TABLE ONLY public.account
    ADD CONSTRAINT account_pkey PRIMARY KEY (id);


--
-- Name: chatmachine chatmachine_pkey; Type: CONSTRAINT; Schema: public; Owner: blairuser
--

ALTER TABLE ONLY public.chatmachine
    ADD CONSTRAINT chatmachine_pkey PRIMARY KEY (id);


--
-- Name: events events_pkey; Type: CONSTRAINT; Schema: public; Owner: blairuser
--

ALTER TABLE ONLY public.events
    ADD CONSTRAINT events_pkey PRIMARY KEY (id);


--
-- Name: imagelocs imagelocs_pkey; Type: CONSTRAINT; Schema: public; Owner: blairuser
--

ALTER TABLE ONLY public.imagelocs
    ADD CONSTRAINT imagelocs_pkey PRIMARY KEY (id);


--
-- Name: taskmachine taskmachine_pkey; Type: CONSTRAINT; Schema: public; Owner: blairuser
--

ALTER TABLE ONLY public.taskmachine
    ADD CONSTRAINT taskmachine_pkey PRIMARY KEY (id);


--
-- Name: timeserver timeserver_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.timeserver
    ADD CONSTRAINT timeserver_pkey PRIMARY KEY (id);


--
-- Name: venues venues_pkey; Type: CONSTRAINT; Schema: public; Owner: blairuser
--

ALTER TABLE ONLY public.venues
    ADD CONSTRAINT venues_pkey PRIMARY KEY (id);


--
-- PostgreSQL database dump complete
--
