# Regex
### Character shortcut

\w Any “word” or number (a-z 0-9 _)

\W Any non “word” character

\s Whitespace (space, tab CRLF)

\S Any non whitepsace character

\d Digits (0-9)

\D Any non digit character

. (Period) – Any character except newline

### Meta characters

^ Start of subject (or line in multiline mode)

$ End of subject (or line in multiline mode)

\[ Start character class definition

\] End character class definition

| Alternates, eg (a|b) matches a or b

( Start subpattern

) End subpattern

\ Escape character

### Quantifiers
n* Zero or more of n

n+ One or more of n

n? Zero or one occurrences of n

{n} n occurrences exactly

{n,} At least n occurrences

{,m} At most m occurrences

{n,m} Between n and m occurrences (inclusive)

###Point based assertions

\b Word boundary

\B Not a word boundary

\A Start of subject

\Z End of subject or newline at end

\z End of subject

\G First matching position in subject

### Subpatterns Modifiers & Assertions

bob|bobby

Always use the most specific first like this: bobby|bob

Optional subpattern bob(?:by)?

(?:) Non capturing subpattern ((?:foo|fu)bar) matches foobar or fubar without foo or fu
appearing as a captured subpattern

(?=) Positive look ahead assertion foo(?=bar) matches foo when followed by bar

(?!) Negative look ahead assertion foo(?!bar) matches foo when not followed by bar

(?<=) Positive look behind assertion (?<=foo)bar matches bar when preceded by foo

(?<!) Negative look behind assertion (?<!foo)bar matches bar when not preceded by foo

(?>) Once-only subpatterns (?>\d+)bar Performance enhancing when bar not present

(?#) Comment


### BAck references to Subpatters

\1 will remember the first match and reused, so it was ' after needs to be identical.

It will match 'hello', "hello" but not 'hello"

(['"])\w+\1