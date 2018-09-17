# MyMVCChat

Small chat in PHP 5.6 using a homemade MVC pattern

### Setup

Clone in your Apache's web root directory

Replace database configuration in `./config.php`

Enjoy

### Dev notes

Home made MVC done in full functional PHP 5.6

Before I set the InnoDB engine on my tables I struggled
because I was allowed to insert rows without the foreign key
existing.
Fortunately I already encountered this problem earlier, so I took me
some time to fix it but not too long.

I left a [Note] comment on two methods that I duplicated
but I did not find an elegant way to fix this duplication.
The methods are part of my model files and I did not want
to include them in one an other.

Overall it was a nice project. It took me ~3hours to do.