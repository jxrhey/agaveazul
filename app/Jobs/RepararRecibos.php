<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Recibos;
use PDF;
use Storage;

class RepararRecibos implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      $recs_id = [10036,
      10068,
      10148,
      10164,
      10171,
      10214,
      10276,
      10290,
      10315,
      10330,
      10391,
      10405,
      10422,
      10424,
      10431,
      10433,
      10447,
      10487,
      10510,
      10527,
      10532,
      10533,
      10535,
      10538,
      10540,
      10541,
      10542,
      10548,
      10549,
      10550,
      10551,
      10552,
      10558,
      10564,
      10568,
      10570,
      10576,
      10577,
      10578,
      10580,
      10582,
      10583,
      10584,
      10585,
      10586,
      10590,
      10591,
      10592,
      10593,
      10594,
      10595,
      10598,
      106,
      10600,
      10605,
      10606,
      10607,
      10609,
      10611,
      10616,
      10619,
      10620,
      10638,
      10641,
      10650,
      10651,
      10672,
      10708,
      10716,
      10742,
      10743,
      10747,
      10759,
      10765,
      10774,
      10775,
      10787,
      10792,
      10796,
      10826,
      10827,
      10835,
      10861,
      10862,
      10865,
      10866,
      10870,
      10871,
      10879,
      10883,
      10886,
      10892,
      10893,
      10894,
      10895,
      10914,
      10918,
      10948,
      10949,
      10957,
      10983,
      10984,
      10988,
      10989,
      11011,
      11013,
      11072,
      11073,
      11103,
      11104,
      11105,
      11113,
      11131,
      11132,
      11133,
      11135,
      11136,
      11138,
      11143,
      11150,
      11163,
      11191,
      11215,
      11222,
      11223,
      11238,
      11250,
      11251,
      11252,
      11254,
      11255,
      11256,
      11294,
      11300,
      11303,
      11304,
      11305,
      11308,
      11310,
      11311,
      11312,
      11313,
      11316,
      11321,
      11322,
      11323,
      11324,
      11326,
      11327,
      11328,
      11329,
      11330,
      11331,
      11332,
      11333,
      11334,
      11335,
      11336,
      11337,
      11338,
      11339,
      11340,
      11341,
      11342,
      11343,
      11344,
      11345,
      11346,
      11348,
      11349,
      11350,
      11352,
      11353,
      11354,
      11355,
      11356,
      11358,
      11359,
      11360,
      11361,
      11362,
      11363,
      11364,
      11365,
      11366,
      11367,
      11368,
      11369,
      11370,
      11371,
      11372,
      11373,
      11374,
      11375,
      11377,
      11378,
      11379,
      11380,
      11381,
      11382,
      11383,
      11384,
      11386,
      11387,
      11388,
      11389,
      11391,
      11392,
      11393,
      11394,
      11396,
      11397,
      11399,
      11400,
      11401,
      11402,
      11403,
      11404,
      11405,
      11406,
      11415,
      11418,
      11419,
      11420,
      11421,
      11422,
      11423,
      11424,
      11425,
      11426,
      11427,
      11428,
      11429,
      11430,
      11431,
      11432,
      11433,
      11435,
      11438,
      11439,
      11440,
      11441,
      11443,
      11444,
      11445,
      11446,
      11447,
      11448,
      11449,
      11450,
      11451,
      11452,
      11453,
      11454,
      11455,
      11456,
      11457,
      11458,
      11459,
      11460,
      11461,
      11462,
      11463,
      11465,
      11466,
      11467,
      11469,
      11470,
      11471,
      11472,
      11473,
      11475,
      11476,
      11477,
      11478,
      11479,
      11480,
      11481,
      11482,
      11483,
      11484,
      11485,
      11486,
      11487,
      11488,
      11489,
      11490,
      11491,
      11492,
      11493,
      11494,
      11495,
      11496,
      11497,
      11498,
      11499,
      11500,
      11501,
      11503,
      11504,
      11505,
      11506,
      11508,
      11509,
      11510,
      11511,
      11512,
      11513,
      11514,
      11515,
      11516,
      11517,
      11518,
      11519,
      11520,
      11521,
      11522,
      11523,
      11524,
      11538,
      11539,
      11540,
      11541,
      11544,
      11545,
      11546,
      11547,
      11551,
      11552,
      11554,
      11555,
      11556,
      11557,
      11560,
      11562,
      11570,
      11571,
      11573,
      11574,
      11575,
      11576,
      11577,
      11578,
      11580,
      11581,
      11584,
      11585,
      11586,
      11587,
      11590,
      11591,
      11594,
      11615,
      11616,
      11617,
      11618,
      11619,
      11621,
      11622,
      11623,
      11624,
      11625,
      11626,
      11627,
      11628,
      11629,
      11630,
      11631,
      11632,
      11633,
      11634,
      11635,
      11636,
      11637,
      11638,
      11639,
      11640,
      11641,
      11644,
      11645,
      11647,
      11648,
      11649,
      11650,
      11651,
      11653,
      11654,
      11655,
      11656,
      11657,
      11658,
      11659,
      11660,
      11661,
      11662,
      11663,
      11664,
      11665,
      11666,
      11667,
      11668,
      11669,
      11670,
      11671,
      11672,
      11673,
      11674,
      11675,
      11676,
      11677,
      11678,
      11679,
      11680,
      11681,
      11682,
      11683,
      11684,
      11686,
      11687,
      11688,
      11689,
      11690,
      11691,
      11692,
      11693,
      11694,
      11695,
      11696,
      11697,
      11698,
      11700,
      11701,
      11702,
      11703,
      11704,
      11705,
      11706,
      11707,
      11709,
      11710,
      11711,
      11712,
      11713,
      11714,
      11715,
      11716,
      11717,
      11718,
      11719,
      11720,
      11721,
      11722,
      11723,
      11724,
      11725,
      11726,
      11727,
      11728,
      11729,
      11730,
      11732,
      11733,
      11734,
      11736,
      11737,
      11738,
      11739,
      11740,
      11742,
      11743,
      11744,
      11745,
      11746,
      11747,
      11748,
      11749,
      11750,
      11751,
      11753,
      11754,
      11755,
      11756,
      11757,
      11758,
      11759,
      11760,
      11762,
      11763,
      11764,
      11765,
      11766,
      11767,
      11768,
      11769,
      11770,
      11771,
      11772,
      11773,
      11774,
      11776,
      11777,
      11778,
      11779,
      11780,
      11781,
      11782,
      11783,
      11784,
      11785,
      11786,
      11787,
      11788,
      11789,
      11793,
      11795,
      11796,
      11797,
      11798,
      11800,
      11801,
      11802,
      11803,
      11804,
      11805,
      11807,
      11808,
      11809,
      11810,
      11811,
      11812,
      11813,
      11814,
      11815,
      11816,
      11817,
      11818,
      11819,
      11820,
      11821,
      11822,
      11823,
      11824,
      11825,
      11826,
      11827,
      11828,
      11830,
      11831,
      11832,
      11834,
      11835,
      11836,
      11837,
      11838,
      11840,
      11841,
      11842,
      11843,
      11844,
      11845,
      11846,
      11847,
      11848,
      11849,
      11851,
      11852,
      11853,
      11854,
      11855,
      11856,
      11857,
      11858,
      11860,
      11861,
      11862,
      11863,
      11864,
      11865,
      11866,
      11867,
      11868,
      11869,
      11870,
      11871,
      11872,
      11874,
      11875,
      11876,
      11877,
      11878,
      11879,
      11880,
      11881,
      11882,
      11883,
      11884,
      11885,
      11886,
      11887,
      11888,
      11890,
      11891,
      11893,
      11894,
      11895,
      11896,
      11897,
      11898,
      11899,
      11900,
      11901,
      11904,
      11910,
      11911,
      11912,
      11913,
      11914,
      11918,
      11925,
      11926,
      11927,
      11928,
      11929,
      11932,
      11933,
      11934,
      11935,
      11936,
      11937,
      11940,
      11947,
      11948,
      11949,
      11950,
      11951,
      11952,
      11953,
      11954,
      11955,
      11956,
      11957,
      11958,
      11959,
      11963,
      11970,
      11971,
      11972,
      11973,
      11974,
      11976,
      11977,
      11978,
      11979,
      11980,
      11981,
      11982,
      11983,
      11984,
      11985,
      11986,
      11987,
      11988,
      11989,
      11990,
      11991,
      11992,
      11993,
      11994,
      11995,
      11997,
      11998,
      11999,
      12001,
      12002,
      12004,
      12005,
      12007,
      12008,
      12009,
      12010,
      12011,
      12012,
      12013,
      12014,
      12015,
      12016,
      12017,
      12018,
      12019,
      12020,
      12021,
      12022,
      12023,
      12024,
      12026,
      12027,
      12028,
      12029,
      12030,
      12031,
      12032,
      12033,
      12034,
      12035,
      12036,
      12037,
      12039,
      12040,
      12041,
      12042,
      12043,
      12045,
      12046,
      12047,
      12048,
      12049,
      12050,
      12051,
      12052,
      12053,
      12054,
      12055,
      12056,
      12058,
      12059,
      12160,
      12161,
      12166,
      12168,
      12169,
      12171,
      12180,
      12181,
      12182,
      12184,
      12185,
      12186,
      12187,
      12188,
      12189,
      12190,
      12192,
      12193,
      12194,
      12195,
      12197,
      12198,
      12199,
      12200,
      12201,
      12202,
      12203,
      12204,
      12205,
      12206,
      12207,
      12208,
      12209,
      12211,
      12212,
      12214,
      12215,
      12216,
      12218,
      12219,
      12221,
      12222,
      12224,
      12225,
      12226,
      12227,
      12228,
      12229,
      12230,
      12231,
      12232,
      12233,
      12237,
      12238,
      12239,
      12241,
      12242,
      12244,
      12245,
      12246,
      12248,
      12249,
      12250,
      12251,
      12252,
      12254,
      12255,
      12256,
      12257,
      12260,
      12261,
      12262,
      12263,
      12264,
      12266,
      12268,
      12269,
      12270,
      12271,
      12272,
      12274,
      12368,
      12370,
      12539,
      12540,
      12541,
      12542,
      12543,
      12544,
      12545,
      12549,
      12550,
      12551,
      12552,
      12553,
      12554,
      12555,
      12556,
      12557,
      12558,
      12559,
      12560,
      12561,
      12562,
      12563,
      12567,
      12569,
      137,
      140,
      162,
      199,
      293,
      412,
      4126,
      4416,
      4459,
      4501,
      4547,
      4644,
      4836,
      5143,
      5148,
      5177,
      5181,
      5218,
      5289,
      5306,
      7426,
      7428,
      7429,
      7430,
      7431,
      7432,
      7433,
      7438,
      7538,
      7539,
      7540,
      7541,
      7542,
      7543,
      7544,
      7545,
      7546,
      7547,
      7549,
      7550,
      7551,
      7552,
      7553,
      7554,
      7555,
      7561,
      7592,
      7593,
      7594,
      7595,
      7596,
      7597,
      7598,
      7599,
      7615,
      7700,
      7717,
      7780,
      7785,
      7787,
      7861,
      7877,
      7902,
      7907,
      7982,
      7999,
      8102,
      8119,
      8139,
      8143,
      8146,
      8171,
      8175,
      8247,
      8264,
      8297,
      8301,
      8304,
      8343,
      8354,
      8388,
      8400,
      8441,
      8448,
      8470,
      8482,
      8494,
      8535,
      8542,
      8564,
      8576,
      8588,
      8606,
      8653,
      8666,
      8683,
      8899,
      8916,
      8938,
      8942,
      8946,
      8982,
      8989,
      9011,
      9023,
      9035,
      9055,
      9064,
      9071,
      9148,
      9165,
      9194,
      9196,
      9199,
      9272,
      9289,
      9296,
      9334,
      9356,
      9367,
      9368,
      9376,
      9385,
      9407,
      9408,
      9410,
      9488,
      9505,
      9585,
      9601,
      9684,
      9701,
      9723,
      9728,
      9803,
      9804,
      9819,
      9832,
      9833,
      9834,
      9917,
      9933,
      9952,
      9955,
      9974];
      $recs = Recibos::where('estado', '=', 2)
      ->where('emision','!=','null')
      //->whereNotIn('id',$recs_id)
      //->where('id',5845)
      ->get();
      info('Reparando recibos...');
      foreach($recs as $recibo) {
          $file = storage_path('app/public/rec_'.$recibo->id.'/emision_'.$recibo->id.'.pdf');
          if(file_exists($file)){
            info('Exists!');
          }
          else{
            info('Not exists');
            $pdf = PDF::loadView('_pdf.recibo', compact('recibo'));
            Storage::disk('public')->put($recibo->storage().'/'.'emision_'.$recibo->id.'.pdf', $pdf->output());
          }
          
      } 
      info('Hecho!');
    }
}
