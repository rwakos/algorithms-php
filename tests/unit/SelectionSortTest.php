<?php
use PHPUnit\Framework\TestCase;
use App\Models\SelectionSort;
/*
 * On a Short list: 179 ms
 * On a Long list: 200 ms
 * */
class SelectionSortTest extends TestCase{

    public $a = [106, 678, 477, 403, 418, 774, 96, 556, 790, 760, 773];
    public $b = [898, 951, 791, 348, 17, 955, 656, 642, 405, 955, 533, 97, 842, 764, 66, 95, 947, 627, 51, 81, 565, 31, 531, 517, 753, 932, 249, 286, 164, 196, 487, 180, 471, 791, 733, 107, 175, 152, 508, 832, 917, 188, 33, 483, 312, 386, 107, 877, 456, 63, 949, 156, 794, 13, 648, 530, 320, 351, 489, 633, 194, 8, 465, 402, 128, 73, 288, 715, 219, 476, 276, 182, 709, 959, 726, 548, 586, 380, 829, 150, 698, 783, 338, 61, 771, 107, 903, 893, 192, 95, 902, 915, 432, 532, 289, 620, 152, 857, 751, 674, 108, 909, 169, 792, 833, 60, 987, 53, 883, 3, 102, 261, 130, 948, 597, 787, 459, 140, 52, 924, 592, 801, 507, 321, 183, 214, 327, 759, 487, 956, 758, 919, 349, 752, 339, 501, 442, 478, 657, 850, 375, 983, 762, 852, 732, 962, 90, 523, 976, 355, 725, 429, 468, 774, 631, 75, 266, 364, 168, 348, 647, 579, 496, 170, 606, 255, 408, 626, 810, 87, 258, 787, 623, 478, 788, 582, 809, 828, 848, 928, 305, 209, 628, 715, 336, 258, 840, 803, 107, 116, 995, 674, 158, 316, 137, 388, 338, 845, 891, 818, 712, 809, 357, 590, 972, 540, 692, 746, 269, 925, 104, 498, 991, 246, 896, 809, 91, 665, 923, 10, 807, 581, 191, 641, 767, 420, 8, 155, 547, 919, 396, 716, 506, 229, 3, 427, 63, 591, 583, 819, 788, 810, 894, 568, 517, 831, 317, 267, 761, 598, 764, 198, 259, 744, 673, 449, 413, 644, 684, 720, 748, 198, 761, 120, 314, 439, 483, 893, 764, 146, 696, 389, 928, 909, 209, 83, 520, 188, 46, 486, 550, 475, 103, 384, 226, 242, 640, 76, 451, 256, 235, 483, 767, 640, 527, 724, 753, 63, 256, 150, 365, 249, 499, 645, 835, 691, 597, 621, 561, 364, 430, 336, 883, 921, 994, 829, 664, 269, 414, 695, 26, 311, 57, 304, 666, 412, 903, 861, 860, 110, 930, 764, 333, 129, 835, 673, 315, 432, 121, 520, 575, 466, 549, 628, 669, 987, 994, 372, 752, 415, 147, 294, 384, 596, 143, 171, 420, 588, 322, 462, 840, 54, 904, 913, 630, 366, 919, 980, 15, 97, 856, 86, 662, 336, 212, 420, 39, 90, 856, 186, 928, 998, 604, 537, 954, 16, 282, 676, 540, 941, 787, 79, 466, 173, 916, 104, 108, 105, 721, 36, 223, 347, 868, 712, 675, 98, 308, 538, 89, 508, 74, 39, 386, 566, 626, 306, 992, 255, 984, 529, 443, 951, 53, 49, 416, 84, 592, 446, 562, 288, 635, 890, 247, 218, 311, 94, 736, 768, 245, 545, 50, 707, 663, 320, 159, 347, 669, 68, 617, 708, 391, 678, 369, 18, 206, 943, 101, 748, 209, 755, 731, 301, 557, 609, 735, 911, 78, 36, 651, 270, 802, 829, 634, 35, 255, 498, 430, 486, 464, 647, 426, 927, 76, 103, 996, 811, 722, 4, 649, 81, 33, 562, 788, 858, 547, 487, 990, 689, 656, 1000, 22, 189, 735, 900, 728, 765, 28, 342, 13, 799, 462, 749, 818, 339, 565, 189, 10, 878, 885, 33, 365, 366, 898, 114, 45, 160, 164, 822, 724, 149, 367, 456, 161, 490, 579, 871, 951, 335, 807, 378, 39, 703, 205, 649, 154, 174, 424, 675, 978, 160, 948, 436, 963, 366, 4, 839, 218, 781, 688, 389, 388, 364, 299, 84, 337, 958, 903, 214, 756, 275, 728, 534, 18, 549, 913, 188, 244, 573, 884, 98, 961, 444, 542, 439, 516, 127, 414, 508, 649, 121, 998, 840, 445, 25, 645, 344, 642, 492, 823, 583, 252, 970, 855, 238, 202, 617, 287, 498, 198, 784, 678, 689, 4, 474, 128, 982, 234, 62, 616, 165, 862, 309, 350, 706, 614, 176, 484, 598, 471, 970, 26, 860, 568, 150, 289, 1, 594, 995, 315, 879, 720, 352, 433, 644, 145, 426, 635, 942, 103, 445, 601, 172, 103, 594, 508, 89, 545, 828, 140, 523, 587, 926, 567, 458, 922, 999, 6, 339, 518, 320, 814, 149, 43, 443, 73, 109, 673, 458, 831, 120, 806, 482, 98, 200, 303, 845, 518, 565, 28, 308, 700, 543, 352, 818, 584, 857, 737, 539, 431, 545, 664, 953, 38, 278, 168, 428, 229, 502, 403, 746, 187, 504, 607, 516, 348, 978, 772, 741, 993, 937, 36, 244, 425, 380, 45, 768, 819, 716, 339, 845, 682, 132, 551, 812, 127, 625, 847, 209, 657, 133, 879, 610, 353, 207, 543, 777, 685, 708, 30, 402, 351, 128, 661, 502, 436, 412, 2, 698, 149, 195, 133, 45, 433, 638, 957, 964, 327, 243, 180, 644, 413, 540, 387, 983, 599, 29, 471, 687, 260, 890, 581, 770, 852, 659, 457, 574, 856, 274, 704, 738, 655, 654, 207, 523, 829, 451, 30, 846, 344, 517, 595, 192, 724, 14, 125, 432, 233, 28, 284, 701, 149, 465, 430, 872, 147, 297, 790, 352, 491, 855, 25, 513, 857, 237, 399, 568, 538, 331, 310, 699, 36, 612, 805, 721, 354, 873, 538, 143, 342, 275, 887, 195, 303, 915, 810, 679, 713, 763, 896, 924, 767, 716, 272, 606, 277, 929, 135, 619, 48, 879, 609, 581, 573, 372, 856, 258, 378, 354, 461, 965, 941, 38, 873, 121, 977, 891, 683, 116, 850, 682, 830, 931, 569, 40, 899, 12, 524, 308, 555, 115, 659, 881, 857, 324, 302, 364, 735, 662, 834, 822, 702, 357, 323, 79, 480, 528, 717, 809, 847, 56, 745, 962, 789, 325, 575, 545, 625, 455, 396, 118, 40, 707, 904, 810, 149, 949, 132, 576, 372, 393, 606, 99, 704, 108, 358, 662, 379, 203, 759, 218, 440, 568, 459, 639, 335, 674, 376, 202, 347, 356, 197, 970, 582, 161, 838, 926, 576, 856, 176, 406, 371, 255, 52, 963, 476, 944, 626, 251, 281, 280, 356, 965, 40, 970, 543, 500, 483, 452, 290, 23, 562, 605, 39, 208, 719, 173, 851, 687, 965, 409, 297, 74, 277, 717, 609, 57, 663, 955, 124, 821];

    public $a_sorted = [96, 106, 403, 418, 477, 556, 678, 760, 773, 774, 790];
    public $b_sorted = [1, 2, 3, 3, 4, 4, 4, 6, 8, 8, 10, 10, 12, 13, 13, 14, 15, 16, 17, 18, 18, 22, 23, 25, 25, 26, 26, 28, 28, 28, 29, 30, 30, 31, 33, 33, 33, 35, 36, 36, 36, 36, 38, 38, 39, 39, 39, 39, 40, 40, 40, 43, 45, 45, 45, 46, 48, 49, 50, 51, 52, 52, 53, 53, 54, 56, 57, 57, 60, 61, 62, 63, 63, 63, 66, 68, 73, 73, 74, 74, 75, 76, 76, 78, 79, 79, 81, 81, 83, 84, 84, 86, 87, 89, 89, 90, 90, 91, 94, 95, 95, 97, 97, 98, 98, 98, 99, 101, 102, 103, 103, 103, 103, 104, 104, 105, 107, 107, 107, 107, 108, 108, 108, 109, 110, 114, 115, 116, 116, 118, 120, 120, 121, 121, 121, 124, 125, 127, 127, 128, 128, 128, 129, 130, 132, 132, 133, 133, 135, 137, 140, 140, 143, 143, 145, 146, 147, 147, 149, 149, 149, 149, 149, 150, 150, 150, 152, 152, 154, 155, 156, 158, 159, 160, 160, 161, 161, 164, 164, 165, 168, 168, 169, 170, 171, 172, 173, 173, 174, 175, 176, 176, 180, 180, 182, 183, 186, 187, 188, 188, 188, 189, 189, 191, 192, 192, 194, 195, 195, 196, 197, 198, 198, 198, 200, 202, 202, 203, 205, 206, 207, 207, 208, 209, 209, 209, 209, 212, 214, 214, 218, 218, 218, 219, 223, 226, 229, 229, 233, 234, 235, 237, 238, 242, 243, 244, 244, 245, 246, 247, 249, 249, 251, 252, 255, 255, 255, 255, 256, 256, 258, 258, 258, 259, 260, 261, 266, 267, 269, 269, 270, 272, 274, 275, 275, 276, 277, 277, 278, 280, 281, 282, 284, 286, 287, 288, 288, 289, 289, 290, 294, 297, 297, 299, 301, 302, 303, 303, 304, 305, 306, 308, 308, 308, 309, 310, 311, 311, 312, 314, 315, 315, 316, 317, 320, 320, 320, 321, 322, 323, 324, 325, 327, 327, 331, 333, 335, 335, 336, 336, 336, 337, 338, 338, 339, 339, 339, 339, 342, 342, 344, 344, 347, 347, 347, 348, 348, 348, 349, 350, 351, 351, 352, 352, 352, 353, 354, 354, 355, 356, 356, 357, 357, 358, 364, 364, 364, 364, 365, 365, 366, 366, 366, 367, 369, 371, 372, 372, 372, 375, 376, 378, 378, 379, 380, 380, 384, 384, 386, 386, 387, 388, 388, 389, 389, 391, 393, 396, 396, 399, 402, 402, 403, 405, 406, 408, 409, 412, 412, 413, 413, 414, 414, 415, 416, 420, 420, 420, 424, 425, 426, 426, 427, 428, 429, 430, 430, 430, 431, 432, 432, 432, 433, 433, 436, 436, 439, 439, 440, 442, 443, 443, 444, 445, 445, 446, 449, 451, 451, 452, 455, 456, 456, 457, 458, 458, 459, 459, 461, 462, 462, 464, 465, 465, 466, 466, 468, 471, 471, 471, 474, 475, 476, 476, 478, 478, 480, 482, 483, 483, 483, 483, 484, 486, 486, 487, 487, 487, 489, 490, 491, 492, 496, 498, 498, 498, 499, 500, 501, 502, 502, 504, 506, 507, 508, 508, 508, 508, 513, 516, 516, 517, 517, 517, 518, 518, 520, 520, 523, 523, 523, 524, 527, 528, 529, 530, 531, 532, 533, 534, 537, 538, 538, 538, 539, 540, 540, 540, 542, 543, 543, 543, 545, 545, 545, 545, 547, 547, 548, 549, 549, 550, 551, 555, 557, 561, 562, 562, 562, 565, 565, 565, 566, 567, 568, 568, 568, 568, 569, 573, 573, 574, 575, 575, 576, 576, 579, 579, 581, 581, 581, 582, 582, 583, 583, 584, 586, 587, 588, 590, 591, 592, 592, 594, 594, 595, 596, 597, 597, 598, 598, 599, 601, 604, 605, 606, 606, 606, 607, 609, 609, 609, 610, 612, 614, 616, 617, 617, 619, 620, 621, 623, 625, 625, 626, 626, 626, 627, 628, 628, 630, 631, 633, 634, 635, 635, 638, 639, 640, 640, 641, 642, 642, 644, 644, 644, 645, 645, 647, 647, 648, 649, 649, 649, 651, 654, 655, 656, 656, 657, 657, 659, 659, 661, 662, 662, 662, 663, 663, 664, 664, 665, 666, 669, 669, 673, 673, 673, 674, 674, 674, 675, 675, 676, 678, 678, 679, 682, 682, 683, 684, 685, 687, 687, 688, 689, 689, 691, 692, 695, 696, 698, 698, 699, 700, 701, 702, 703, 704, 704, 706, 707, 707, 708, 708, 709, 712, 712, 713, 715, 715, 716, 716, 716, 717, 717, 719, 720, 720, 721, 721, 722, 724, 724, 724, 725, 726, 728, 728, 731, 732, 733, 735, 735, 735, 736, 737, 738, 741, 744, 745, 746, 746, 748, 748, 749, 751, 752, 752, 753, 753, 755, 756, 758, 759, 759, 761, 761, 762, 763, 764, 764, 764, 764, 765, 767, 767, 767, 768, 768, 770, 771, 772, 774, 777, 781, 783, 784, 787, 787, 787, 788, 788, 788, 789, 790, 791, 791, 792, 794, 799, 801, 802, 803, 805, 806, 807, 807, 809, 809, 809, 809, 810, 810, 810, 810, 811, 812, 814, 818, 818, 818, 819, 819, 821, 822, 822, 823, 828, 828, 829, 829, 829, 829, 830, 831, 831, 832, 833, 834, 835, 835, 838, 839, 840, 840, 840, 842, 845, 845, 845, 846, 847, 847, 848, 850, 850, 851, 852, 852, 855, 855, 856, 856, 856, 856, 856, 857, 857, 857, 857, 858, 860, 860, 861, 862, 868, 871, 872, 873, 873, 877, 878, 879, 879, 879, 881, 883, 883, 884, 885, 887, 890, 890, 891, 891, 893, 893, 894, 896, 896, 898, 898, 899, 900, 902, 903, 903, 903, 904, 904, 909, 909, 911, 913, 913, 915, 915, 916, 917, 919, 919, 919, 921, 922, 923, 924, 924, 925, 926, 926, 927, 928, 928, 928, 929, 930, 931, 932, 937, 941, 941, 942, 943, 944, 947, 948, 948, 949, 949, 951, 951, 951, 953, 954, 955, 955, 955, 956, 957, 958, 959, 961, 962, 962, 963, 963, 964, 965, 965, 965, 970, 970, 970, 970, 972, 976, 977, 978, 978, 980, 982, 983, 983, 984, 987, 987, 990, 991, 992, 993, 994, 994, 995, 995, 996, 998, 998, 999, 1000];

    function testInsertSortOnShortList(){
        $obj = new SelectionSort($this->a);
        $result = $obj->sort();
        $this->assertEquals($this->a_sorted, $result);
    }

    function testInsertSortOnLongList(){
        $obj = new SelectionSort($this->b);
        $result = $obj->sort();
        $this->assertEquals($this->b_sorted, $result);
    }

    /**
     * @expectedException ArgumentCountError
     */
    public function testThrowsExceptionIfNoDataIsPassed()
    {
        new SelectionSort();
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testThrowsExceptionIfNonTypeExpectedPassed()
    {
        new SelectionSort('a');
    }
}