QRcode Perl/CGI & PHP scripts ver. 0.50j
                                               (c)2000-2013, Y.Swetake

�������Υץ������ǤǤ��뤳�ȡ�
�������Υץ�������perl���뤤��PHP���Ѥ��ƥ֥饦�����QRcode��
��ɽ�����뤿��Τ�ΤǤ���
����perl��(qr_img.cgi)�ϥ��ޥ�ɥ饤�󤫤�Ǥ�ư��ޤ���
�������ΥС������Ǥ� QRcode model2 �� version 1��40 ���б�����
�����ޤ����������ʲ��ε�ǽ���⡼�ɤϻ��ѤǤ��ޤ���

����(1)���������ѿ��������ӥåȥ⡼�ɰʳ��Υ⡼��
����(2)�������������ǤΥ⡼�ɤ��ѹ�
�������ʤɤʤ�

�������С������0.40���Ϣ��˻Ū���б����Ƥ��ޤ���

�����������˴�����URL���󥳡��ɥǡ������Ϥ��Ƥ����Ѵ���Ψ�ϰ����Ǥ���
���������ӥåȥ⡼�ɤǥ��󥳡��ɤ��뤳�ȤϤǤ��ޤ���������������ǧ������
���������ϥǥ�����¦�δĶ��ˤ��ޤ���

��������

 (�ǥ��쥯�ȥ깽¤)

  qr_img0.50-+-perl--+- qr_img.cgi
             |       +- qr_image.pl
             |       +- qr_html.pl
             |
             +-data -+- qrvV_N.dat
             |       +- rscX.dat
             |       +- qrvfrV.dat
             |
             +-image-+- qrvV.png
             |       +- b.png d.png
             |       
             +-php  -- qr_img.php


��qr_img.cgi     �ѣҥ�����ɽ��perl CGI�ʣ��Ĥ�image����ϡ�������GD��ɬ�ס�
�����������������������������������������ޤ���ʣ���β������Ȥ߹�碌��html��ɽ����
��qr_image.pl����perl�Ǥ�png,jpeg���᡼�����ϥ�����
��qr_html.pl     perl�Ǥ�html���ϥ�����

��qrvV_N.dat �����С������V,���顼������٥�N�ѥǡ���
��rscX.dat���������顼�����������������Ѥ���黻�ơ��֥�
��qrvfrV.dat �����С������V�Ѹ����ΰ�ǡ���(html�⡼����)

��qrvV.png �������С������V�Ѹ��ꥤ�᡼��(png,jpeg������)
��b.png          qr_img.cgi��html�⡼�ɤ��Ѥ���png�ե�����
��d.png          Ʊ��

��qr_img.php     �ѣҥ�����ɽ��PHP�ʣ��Ĥ�image����ϡ�������GD��ɬ�ס���

  README.txt  ���Υե�����
  README.sjis ���Υե������ShiftJIS��
  README-e.txt �Ѹ��ǥɥ������

���������®�����뤿��Ƽ�黻��̤�dat�ե�����ˤޤȤ�Ƥ��ޤ���
�����Τ����פΥե����륵�����������礭���ʤäƤ���ޤ���
�����餫����Ȥ��С�����󤬸¤��Ƥ�����ϻ��Ѥ��ʤ�dat�ե������
��������Ƥ����ꤢ��ޤ���
���ʤ�rscX.dat�ˤĤ��Ƥ�JIS X 0510��ɽ����������RS�֥��å��ι��ܤ�
��(c,k,r)�Ȥ������c��k�κ�������˳������ޤ���
���㤨�ХС������1-M��(26,16,4)�Ȥ���Τ�26-16=10��rsc10.dat�����
�����ޤ���

����ɬ�פʤ��
���¹Ԥ�ɬ�פʤ��
��perl��
������WWW�����С���(perl CGI��ư����Ρ�)
������perl5

�����ʲ��Τ�Τ�qr_img.cgi��PNG/JPEG���Ϥ�ɬ�פǤ���
������GD
��������http://www.boutell.com/gd/
������GD.pm
��������http://stein.cshl.org/WWW/software/GD/GD.html
������libpng
    ��jpeg-6b

�������ץ��������� png �� gif ���ѹ�����ȸŤ�gd(1.5����)�Ȥ����Ѥ�GD.pm�Ǥ�
����ư��ޤ����õ���Ϣ�����꤬���඲�줬����ޤ��λ��ѼԼ��Ȥ���Ǥ�Ǥ��Ȥ�����
����������

��PHP��
������WWW�����С�
������PHP4.1�ʹ�
������GD
������libpng

������GD 2.0�ˤĤ���
������perl��,PHP�ǤȤ�GD2.0.10̤�������PHP4.3.0�Х�ɥ��
������GD�Ǥ�GD�ΥХ��ˤ�������ư��ޤ���
������GD2.0.10�ʾ�򤴻��Ѥ���������

��ư���ǧ�Ķ�
����perl�ǡ�PHP�ǤȤ�
     Linux 2.4.18
���� apache-1.3.27 + PHP-4.3.0(as apache module)
���� perl 5.6.1
���� GD 2.0.11
���� GD.pm 2.06

�����뤿���ɬ�פʤ��
������WWW�֥饦��

����������ˡ
������������
������������perl��
���������������ܤ�
    ������#!/usr/bin/perl
�����������򤽤Υ����С���perl�ؤΥѥ�����ꤷ�ޤ���

�������������˲��������ꤷ�ޤ�

# -------- setting area --------
#

 $path="./../data";                # ---You must set path to data files.

�����ǡ����ե����뷲("qrv*.dat","rsc*.dat")�ؤΥѥ�����ꤷ�ޤ���
�����ǥե���Ȥ�Ʊ���ؤˤ��� data �ǥ��쥯�ȥ�Ǥ���

 # ---- for PNG or JPEG image
 $image_path="./../image";          # ---You must set path to QRcode frame images.

���������ΰ襤�᡼����(qrv*.png)�ؤΥѥ�����ꤷ�ޤ���
�����ǥե���Ȥ�Ʊ���ؤˤ��� image �ǥ��쥯�ȥ�Ǥ���

 # ---- for HTML mode
 $img_path4html="";           # ---You must set path to b.png and d.png.
                              # Default setting is document root.

������HTML�⡼�ɤ������Ԥ��ޤ���
������Ʊ�����Ƥ���b.png d.png���֤������ؤΥѥ��ޤ���URL����ꤷ�ޤ���
�����������ϥɥ�����ȥ롼�Ȥ���Υѥ����뤤��URL�ˤʤ�ޤ���
���������Ȥ��Хɥ�����ȥ롼�Ȳ���img�ǥ��쥯�ȥ�ˤ������ʤ��
��
��������$img_path4html="/img";
��
���������Ȥʤ�ޤ���

 @img_fn=("b.png","d.png");    # In html mode,image size depends these files.

��
�����������ե������̾�����ѹ�����������"b.png","d.png"����ʬ���ѹ����ޤ���
������html�⡼�ɤǤϥ��᡼���Υ������Ϥ��Υե�����β������礭���˰�¸���ޤ���
��

 $always_html_mode=0;

��
������1�����ꤹ��Ⱦ��html�⡼�ɤǽ��Ϥ��ޤ���
��

 $version_ul=40;

��
��    �С������ξ�¤����Ǥ��ޤ����ͤϣ����飴���������Ǥ���
��

#
# ------- setting area end --------


������������PHP��

���������ꤷ�ޤ���
/* ------ setting area ------ */

$path="./../data";           /* You must set the path to data files. */

�����ǡ����ե����뷲("qrv*.dat","rsc*.dat")�ؤΥѥ�����ꤷ�ޤ���
�����ǥե���Ȥ�Ʊ���ؤˤ��� data �ǥ��쥯�ȥ�Ǥ���

$image_path="./../image";     /* You must set path to QRcode frame images. */

���������ΰ襤�᡼����(qrvN.png)�ؤΥѥ�����ꤷ�ޤ���
�����ǥե���Ȥ�Ʊ���ؤˤ��� image �ǥ��쥯�ȥ�Ǥ���

$version_ul=40;              /* upper limit for version */

���С������ξ�¤����Ǥ��ޤ����ͤ�1����40�������Ǥ���

/* ------ setting area end ------ */


����������
�������������֥饦������θƤӽФ�

������qr_img.cgi?d=data[&e=(L,M,Q,H)][&s=int size][&v=(1-40)][&t=(J,H)]
������           [&m=(1-16)&n=(2-16)[&o=original data][&p=(0-255)]]

������qr_img.php?d=data[&e=(L,M,Q,H)][&s=int size][&v=(1-40)][&t=J]
������           [&m=(1-16)&n=(2-16)[&o=original data][&p=(0-255)]]

������d:QR�����ɲ�����ǡ����Ǥ����ü�ʸ����8bitʸ����URLencode����Ƥ���
��������ɬ�פ�����ޤ���(������'%'��%+16��ɽ���������'+'��)
�����������̤�Ķ����ȥ��顼ɽ���Ȥʤ�ޤ���
�����������Υѥ�᡼���Ͼ�ά�Ǥ��ޤ���

������e:���顼������٥�
�����������顼������٥����ꤷ�ޤ���
������������Ǥ���Τ�L,M,Q,H�Σ�����Ǿ�ά������� M �����򤵤�ޤ���

������s:�⥸�塼�륵����
���������⥸�塼�륵��������ꤷ�ޤ���
������������Ǥ���Τ�1�ʾ�������Ǥ����ͤǥ��᡼���Υ����������ꤵ��ޤ���
����������ά������� 4(png) �ޤ��� 8(jpeg) �����򤵤�ޤ���
��������html�⡼�ɤǤϰ�̣������ޤ���

������v:�С������
���������С���������ꤷ�ޤ���
�����������Υץ������ǻ���Ǥ���С�������1��40�Ǥ���
����������ά�������ϥץ�����ब��ư���򤷤ޤ���

������t:����������
�����������������פ���ꤷ�ޤ���
����������ά�������䲼��ʸ���ʳ���PNG����Ϥ��ޤ���
��������J����ꤹ���jpeg�ǽ��Ϥ��ޤ���
��������H����ꤹ���html�⡼�ɤǽ��Ϥ��ޤ���
���������ʤ�jpeg�Ǥν��Ϥ�GD��jpeg�б����Ƥ���ɬ�פ�����ޤ���


�������ʲ���Ϣ��⡼���ѤΥѥ�᡼���Ǥ������߻Ū���б����Ƥ��ޤ���

������m:Ϣ��β����ܤΥ��᡼����

������n:�����ǲ��ĤΥ��᡼�������뤫

������o:���Υǡ���(URL���󥳡��ɤ���Ƥ���ɬ�פ�����ޤ���)

������p:���ǡ������黻�Ф����ѥ�ƥ��͡ʳ�ʸ���Υ��������ͤ���¾�����¤�����Ρ�

������Ϣ�����ꤹ��Ȥ���m��n��ɬ�ܤǤ���
�������ޤ�o�ޤ���p�Τ����줫��ɬ�����ꤹ��ɬ�פ�����ޤ���

�������㡧abcdefgabcdefg0�򣲤Ĥ�ʬ�䤹��Ȥ�

���������Ĥ�Υ��᡼��
          qr_img.cgi?d=abcdefg&n=2&m=1&o=abcdefgabcdefg0
���������Ĥ�Υ��᡼��
          qr_img.cgi?d=abcdefg0&n=2&m=2&o=abcdefgabcdefg0

���������ޤ��Ϥ��餫����ѥ�ƥ��ͤ�׻����Ƥ�����

���������Ĥ�Υ��᡼��
����������qr_img.cgi?d=abcdefg&n=2&m=1&p=48
���������Ĥ�Υ��᡼��
          qr_img.cgi?d=abcdefg0&n=2&m=2&p=48


���������������ޥ�ɥ饤��⡼��
����qr_img.cgi�ϥ��ޥ�ɥ饤�󤫤��¹ԤǤ��ޤ���
���������֤϶���Ƕ��ڤ�ޤ���
��������d�ǥǡ������Ϥ�����CGIƱ�ͥǡ�����URL���󥳡��ɤ���Ƥ���ɬ�פ�����ޤ���
�����㣱
���� $ ./qr_img.cgi d=This+is+a+pen e=L s=3 > qrcode.png

����ɸ�����Ϥ���ǡ������Ϥ��������ǡ����ΤޤޤǣϣˤǤ���
�����㣲
���� $ ./qr_img.cgi e=H < data.txt > qrcode.png


�������ջ���
�����������Τξ头���Ѥ���������
�����ʣ��ˤ��Υץ������Υޥ���Ƚ��롼����Ϥ����餯���ʤȰۤʤ�ޤ���
���������ʰ��JIS X 0510�ˤ���ޣ�����°�񣸤���η�̤ȤϹ礦�褦�ˤ�
�����������Ƥ��ޤ���)
���������ʥޥ������������äƤ�»��Ѿ������ʤ��Ȼפ��ޤ�������
�����ʣ���Ϣ��⡼�ɤϻŪƳ���Ǥ���
�����ʣ��ˤ���¾�ºݤε��ʤȰۤʤ�ư��򤹤붲�줬¿ʬ�ˤ���ޤ���
�������������ѤκݤϽ��Ϥ��줿����ܥ뤬�μ¤��ɤ�뤫�Υƥ��Ȥ�Ԥ����Ȥ�
���������������ᤷ�ޤ����ä˥С�����󣲣��ʾ�Υ���ܥ�Ϻ�Ԥμ�����꡼
����������������ǽ���Թ�帡�ڤ��Ǥ��Ƥ��ޤ���Τǻ��Ѥκݤ��äˤ����մꤤ
�����������ޤ���
�����ʣ����ܥץ������ϡ֤Τ��ޡפǤ����礭���С������򥨥󥳡��ɤ���
�������������Ϥ����դ����������ʥ����ॢ���Ȥ��뤫�⤷��ޤ��󡣡�

������������ۤʤ�
���������Υץ�����������Ϻ�ԤǤ���Y.Swetake�ˤ���ޤ���
���������Υץ������ϥե꡼�������Ǥ�����Ȥ����ɽ�����ѹ����ʤ����
����ͳ�˺����ۡ���¤���Ƥ⤫�ޤ��ޤ���

�������ջ���
���������Υץ������ˤ�ä������뤢����»���������פˤĤ��ơ���Ԥ�
��������Ǥ���餤�ޤ���
������ԤϤ����Υץ����������������äƤ⡢��������������̳���餤��
������

��������¾
���ǿ��Ǥϲ����Υڡ������餿�ɤ�ޤ���
����http://www.swetake.com/

�����ո����Զ��ʤɤ���в����ޤ�
����e-mail: swe[���ä�]venus.dti.ne.jp
����[���ä�]��Ŭ���ʵ���˽񤭴����Ƥ���������

������������
    2013/5/18 ver.0.50j
              ����;�ӥå���ʬ��ȿž���Ƥ����Զ�������
�������������������Զ��ˤ���ɤ߼�����٤ؤαƶ��ϳ�̵�ȿ�¬����ޤ����������ͤ˹��פ��뤿���
���������������������ȤʤäƤ��ޤ���
		(����Ŧ���������ޤ��������͡����꤬�Ȥ��������ޤ�����)

    2009/11/10 ver.0.50i
              ��PHP�Ǥˤ�����preg_match�ؿ��������ɽ�����ܥߥ�������

    2009/11/8 ver.0.50h
              ��PHP�Ǥˤ����ơ�PHP5.3.0������侩�Ȥʤä�ereg�ؿ���preg_match�ؿ���
�����������������񤭴��������ʤʤ���������ereg�ؿ���"-"�����ޤ��ޥå����������󥳡���
�����������������⡼�ɤμ�ưȽ�̤����äƤ����Զ���preg_match���ѹ����뤳�Ȥˤ���ä�����
����������������Perl�Ǥˤ�����ǰ�Τ�������ɽ���ε��Ҥ��ѹ�������[]���\-����ֺǸ�˽񤯤褦�ˤ�����
�����������������ʤ��ä�0.50g�����꤬�����Ƥ��ʤ���ХС�����󥢥åפ򤹤�ɬ�פϤʤ��Ȼפ��ޤ���

    2005/7/23 ver.0.50g
              ������Υѥ�᡼�����Ȥ߹�碌�ǥ����С���Υ꥽���������
�������������������񤹤��Զ�������
              ���С������ξ�¤����Ǥ����ѿ����ɲá�

    2005/7/21 ver.0.50f
              ��perl�Ǥˤ��������v�Υ����å�����
              ��php�ǤΥޥ����������������ѹ�(thanks for Mr.Bru, Franky)

    2004/7/19 ver.0.50e
              ��php�Ǥ�alphanumeric�⡼�ɤǵ��椬���������󥳡��ɤǤ��ʤ�
                �Զ�����

              ��rsc36.dat rsc52.dat�η׻��ְ㤤������
               (�ʤ������Υե������model2�Ǥϻ��Ѥ��ޤ���)

    2003/10/5 ver.0.50d
              ��perl/cgi��html�⡼�ɤˤ� $img_path4html �����꤬
              ��ȿ�Ǥ���Ƥ��ʤ��Զ�罤��

    2003/6/19 ver.0.50c
              ���ޥ���������������ѹ�
              ���ɥ�����Ȳ���

    2003/5/24 ver.0.50b 
              ���ɥ�����Ȥβ���

    2003/4/13 ver.0.50a
              ���ե����륪���ץ�����ν���(�Х��ʥ�⡼������)
              �����顼����������
              ���ɥ�����Ȥβ���(GD2.0�˴ؤ��������ɵ�)

    2002/9/21 ver.0.50
              ���С������1-40�б�
              ������®�ٸ���Τ���ʲ��Υ롼�����������ľ��
���������������������顼��������������
�������������������ޥ��������������������

    2002/5/26  ver.0.40
              ��Ϣ��˻Ū���б���ư��Զ����𴿷��פ��ޤ�����
����������������qr_html.cgi ��qr_img.cgi������
����������������qr_img.cgi �ΰ���t=H����ꤹ�뤳�Ȥˤ��html���ϤȤ�����
����������������PHP�Ǥˤ����Ƴ����ѿ��μ����ߤ�super�������Х�ؿ��ˤ��
������������������Τ��ѹ�������(�ǥե���Ȥ�GET)
�����������������ޥ���������ǽ�ѻ�
��������������������¾�������ɤΥ��ƥʥ󥹡�

    2002/2/10 ver.0.31
����������������jpeg���Ϥ��б�

����2001/4/30 ver.0.30
�����������������ޥ�������롼���󹹿���JIS X 0510�οޣ������
������������������°�񣸿ޣ��η�̤ȹ礦�褦���ѹ���
�����������������ʤ���ˤȤ�ʤ��ǡ����ե�����ι����ѹ�����
����������������version 1-9 �б���
����������������qr_img.cgi�Υ��ޥ�ɥ饤���б�

����2001/3/30 ver.0.20a
����������������CGI�Ǥˤƥޥ�������ѥ�᡼�������������ʤ���
�����������������ޥ��������0�ȤʤäƤ����Զ�������
����������������CGI�Ǥ�Ǥ�դΥޥ����ѥ���������ǽ�ѻߡ�

    2001/3/9  ver. 0.20
����������������version 1-6 �б�
���������������������ȼ���ǡ���������ECC�롼�����������ѹ���

    2001/2/11 ver. 0.10B
���������������������롼���󹹿�������®��20��30%up��
����������������PHP���ɲá�

����2000/9/11 ver. 0.10 ����
��������������(version1�ο������ѿ�����8bit�⡼�ɤΤߥ��ݡ���)

[eof]