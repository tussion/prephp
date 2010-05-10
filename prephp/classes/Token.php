<?php
	// define undefined tokens (php evolves...)
	if (!defined('T_ML_COMMENT'))
		define('T_ML_COMMENT', T_COMMENT);
	if (!defined('T_OLD_FUNCTION'))
		define('T_OLD_FUNCTION', 1000001); // TODO: Find out correct number
		
	// need to define these newer tokens, in case an older PHP Version is used
	if (!defined('T_DIR'))
		define('T_DIR',		379);
	if (!defined('T_GOTO'))
		define('T_GOTO',	333);
	if (!defined('T_NAMESPACE'))
		define('T_NAMESPACE',377);
	if (!defined('T_NS_C'))
		define('T_NS_C',	378);
	if (!defined('T_USE'))
		define('T_USE',		340);
	
	// define custom one char tokens
	define('T_OPEN_ROUND',	1001);
	define('T_CLOSE_ROUND',	1002);
	define('T_OPEN_SQUARE',	1003);
	define('T_CLOSE_SQUARE',1004);
	define('T_OPEN_CURLY',	1005);
	define('T_CLOSE_CURLY',	1006);
	define('T_SEMICOLON',	1007);
	define('T_DOT',			1008);
	define('T_COMMA',		1009);
	define('T_EQUAL',		1010);
	define('T_LT',			1011);
	define('T_GT',			1012);
	define('T_PLUS',		1013);
	define('T_MINUS',		1014);
	define('T_MULT',		1015);
	define('T_DIV',			1016);
	define('T_QUESTION',	1017);
	define('T_EXCLAMATION',	1018);
	define('T_COLON',		1019);
	define('T_DOUBLE_QUOTES',1020);
	define('T_AT',			1021);
	define('T_AMP',			1022);
	define('T_PERCENT',		1023);
	define('T_PIPE',		1024);
	define('T_DOLLAR',		1025);
	define('T_CARET',		1026);
	define('T_TILDE',		1027);
	define('T_BACKTICK',	1028);
	
	class Prephp_Token
	{
		protected $tokId; // Token Identifier. Something like T_VARIABLE
		protected $content; // Token Content. Something like "$var"
		protected $line; // Line of Token (e.g. for Exceptions). Something like 7
		
		// I define all the tokens here again, cause some could think
		// it was cleaner to write Prephp_Token::T_DOT instead of T_DOT
		
		// This is *DEPRECATED* and will be removed
		const T_OPEN_ROUND		= T_OPEN_ROUND;
		const T_CLOSE_ROUND 	= T_CLOSE_ROUND;
		const T_OPEN_SQUARE 	= T_OPEN_SQUARE;
		const T_CLOSE_SQUARE	= T_CLOSE_SQUARE;
		const T_OPEN_CURLY		= T_OPEN_CURLY;
		const T_CLOSE_CURLY		= T_CLOSE_CURLY;
		const T_SEMICOLON		= T_SEMICOLON;
		const T_DOT				= T_DOT;
		const T_COMMA			= T_COMMA;
		const T_EQUAL			= T_EQUAL;
		const T_LT				= T_LT;
		const T_GT				= T_GT;
		const T_PLUS			= T_PLUS;
		const T_MINUS			= T_MINUS;
		const T_MULT			= T_MULT;
		const T_DIV				= T_DIV;
		const T_QUESTION		= T_QUESTION;
		const T_EXCLAMATION		= T_EXCLAMATION;
		const T_COLON			= T_COLON;
		const T_DOUBLE_QUOTES	= T_DOUBLE_QUOTES;
		const T_AT				= T_AT;
		const T_AMP				= T_AMP;
		const T_PERCENT			= T_PERCENT;
		const T_PIPE			= T_PIPE;
		const T_DOLLAR			= T_DOLLAR;
		const T_CARET			= T_CARET;
		const T_TILDE			= T_TILDE;
		const T_BACKTICK		= T_BACKTICK;
		const T_ABSTRACT		= T_ABSTRACT;
		const T_AND_EQUAL		= T_AND_EQUAL;
		const T_ARRAY			= T_ARRAY;
		const T_ARRAY_CAST		= T_ARRAY_CAST;
		const T_AS				= T_AS;
		const T_BAD_CHARACTER	= T_BAD_CHARACTER;
		const T_BOOLEAN_AND		= T_BOOLEAN_AND;
		const T_BOOLEAN_OR		= T_BOOLEAN_OR;
		const T_BOOL_CAST		= T_BOOL_CAST;
		const T_BREAK			= T_BREAK;
		const T_CASE			= T_CASE;
		const T_CATCH			= T_CATCH;
		const T_CHARACTER		= T_CHARACTER;
		const T_CLASS			= T_CLASS;
		const T_CLASS_C			= T_CLASS_C;
		const T_CLONE			= T_CLONE;
		const T_CLOSE_TAG		= T_CLOSE_TAG;
		const T_COMMENT			= T_COMMENT;
		const T_CONCAT_EQUAL	= T_CONCAT_EQUAL;
		const T_CONST			= T_CONST;
		const T_CONSTANT_ENCAPSED_STRING = T_CONSTANT_ENCAPSED_STRING;
		const T_CONTINUE		= T_CONTINUE;
		const T_CURLY_OPEN		= T_CURLY_OPEN;
		const T_DEC				= T_DEC;
		const T_DECLARE 		= T_DECLARE;
		const T_DEFAULT 		= T_DEFAULT;
		const T_DIR				= T_DIR;
		const T_DIV_EQUAL		= T_DIV_EQUAL;
		const T_DNUMBER			= T_DNUMBER;
		const T_DOC_COMMENT		= T_DOC_COMMENT;
		const T_DO				= T_DO;
		const T_DOLLAR_OPEN_CURLY_BRACES = T_DOLLAR_OPEN_CURLY_BRACES;
		const T_DOUBLE_ARROW	= T_DOUBLE_ARROW;
		const T_DOUBLE_CAST		= T_DOUBLE_CAST;
		const T_DOUBLE_COLON	= T_DOUBLE_COLON;
		const T_ECHO			= T_ECHO;
		const T_ELSE			= T_ELSE;
		const T_ELSEIF			= T_ELSEIF;
		const T_EMPTY			= T_EMPTY;
		const T_ENCAPSED_AND_WHITESPACE = T_ENCAPSED_AND_WHITESPACE;
		const T_ENDDECLARE		= T_ENDDECLARE;
		const T_ENDFOR			= T_ENDFOR;
		const T_ENDFOREACH		= T_ENDFOREACH;
		const T_ENDIF			= T_ENDIF;
		const T_ENDSWITCH		= T_ENDSWITCH;
		const T_ENDWHILE		= T_ENDWHILE;
		const T_END_HEREDOC		= T_END_HEREDOC;
		const T_EVAL			= T_EVAL;
		const T_EXIT			= T_EXIT;
		const T_EXTENDS			= T_EXTENDS;
		const T_FILE			= T_FILE;
		const T_FINAL			= T_FINAL;
		const T_FOR				= T_FOR;
		const T_FOREACH			= T_FOREACH;
		const T_FUNCTION		= T_FUNCTION;
		const T_FUNC_C			= T_FUNC_C;
		const T_GLOBAL			= T_GLOBAL;
		const T_GOTO			= T_GOTO;
		const T_HALT_COMPILER	= T_HALT_COMPILER;
		const T_IF				= T_IF;
		const T_IMPLEMENTS		= T_IMPLEMENTS;
		const T_INC				= T_INC;
		const T_INCLUDE			= T_INCLUDE;
		const T_INCLUDE_ONCE	= T_INCLUDE_ONCE;
		const T_INLINE_HTML		= T_INLINE_HTML;
		const T_INSTANCEOF		= T_INSTANCEOF;
		const T_INT_CAST		= T_INT_CAST;
		const T_INTERFACE		= T_INTERFACE;
		const T_ISSET			= T_ISSET;
		const T_IS_EQUAL		= T_IS_EQUAL;
		const T_IS_GREATER_OR_EQUAL = T_IS_GREATER_OR_EQUAL;
		const T_IS_IDENTICAL	= T_IS_IDENTICAL;
		const T_IS_NOT_EQUAL	= T_IS_NOT_EQUAL;
		const T_IS_NOT_IDENTICAL= T_IS_NOT_IDENTICAL;
		const T_IS_SMALLER_OR_EQUAL = T_IS_SMALLER_OR_EQUAL;
		const T_LINE			= T_LINE;
		const T_LIST			= T_LIST;
		const T_LNUMBER			= T_LNUMBER;
		const T_LOGICAL_AND		= T_LOGICAL_AND;
		const T_LOGICAL_OR		= T_LOGICAL_OR;
		const T_LOGICAL_XOR		= T_LOGICAL_XOR;
		const T_METHOD_C		= T_METHOD_C;
		const T_MINUS_EQUAL		= T_MINUS_EQUAL;
		const T_ML_COMMENT		= T_ML_COMMENT;
		const T_MOD_EQUAL		= T_MOD_EQUAL;
		const T_MUL_EQUAL		= T_MUL_EQUAL;
		const T_NAMESPACE		= T_NAMESPACE;
		const T_NS_C			= T_NS_C;
		const T_NEW				= T_NEW;
		const T_NUM_STRING		= T_NUM_STRING;
		const T_OBJECT_CAST		= T_OBJECT_CAST;
		const T_OBJECT_OPERATOR	= T_OBJECT_OPERATOR;
		const T_OLD_FUNCTION	= T_OLD_FUNCTION;
		const T_OPEN_TAG		= T_OPEN_TAG;
		const T_OPEN_TAG_WITH_ECHO = T_OPEN_TAG_WITH_ECHO;
		const T_OR_EQUAL		= T_OR_EQUAL;
		const T_PAAMAYIM_NEKUDOTAYIM = T_PAAMAYIM_NEKUDOTAYIM;
		const T_PLUS_EQUAL		= T_PLUS_EQUAL;
		const T_PRINT			= T_PRINT;
		const T_PRIVATE			= T_PRIVATE;
		const T_PUBLIC			= T_PUBLIC;
		const T_PROTECTED		= T_PROTECTED;
		const T_REQUIRE			= T_REQUIRE;
		const T_REQUIRE_ONCE	= T_REQUIRE_ONCE;
		const T_RETURN			= T_RETURN;
		const T_SL				= T_SL;
		const T_SL_EQUAL		= T_SL_EQUAL;
		const T_SR				= T_SR;
		const T_SR_EQUAL		= T_SR_EQUAL;
		const T_START_HEREDOC	= T_START_HEREDOC;
		const T_STATIC			= T_STATIC;
		const T_STRING			= T_STRING;
		const T_STRING_CAST		= T_STRING_CAST;
		const T_STRING_VARNAME	= T_STRING_VARNAME;
		const T_SWITCH			= T_SWITCH;
		const T_THROW			= T_THROW;
		const T_TRY				= T_TRY;
		const T_UNSET			= T_UNSET;
		const T_UNSET_CAST		= T_UNSET_CAST;
		const T_USE				= T_USE;
		const T_VAR				= T_VAR;
		const T_VARIABLE		= T_VARIABLE;
		const T_WHILE			= T_WHILE;
		const T_WHITESPACE		= T_WHITESPACE;
		const T_XOR_EQUAL		= T_XOR_EQUAL;
		
		public function __construct($tokId, $content, $line = -1) {
			$this->tokId = $tokId;
			$this->content = $content;
			$this->line = $line;
		}
		
		public function getTokenId() {
			return $this->tokId;
		}
		
		public function getContent() {
			return $this->content;
		}
		public function __toString() {
			return $this->content;
		}
		
		public function getLine() {
			return $this->line;
		}
		
		// $tokId may be a T_ or an array(T_,T_,...)
		public function is($tokId) {
			return $tokId==$this->tokId || (is_array($tokId) && in_array($this->tokId, $tokId));
		}
	}
?>