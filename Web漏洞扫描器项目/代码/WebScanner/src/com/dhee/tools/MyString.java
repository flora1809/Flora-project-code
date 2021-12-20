package com.dhee.tools;
/*Æ´½ÓURL*/
public class MyString {
	public String check(String str1, String str2){
		int result0 = str2.indexOf("//");
		if (result0 != -1) {
			str1 = str1.substring(0, str1.indexOf("/"));
			int index = str2.indexOf("/");
			str2 = str2.substring(index);
			//System.out.println(str1 + str2);
			return (str1  + str2);
		} else {
			int result1 = str2.indexOf("/");
			if (result1 != -1) {
				String str3 = str2.substring(0, str2.indexOf("/"));
				if (str3.length() == 0) {
					str3 = str2.substring(1);
					int result2 = str3.indexOf("/");
					if (result2 != -1) {
						str3 = str2.substring(1, str2.indexOf("/", str2
								.indexOf("/") + 1));
						str2 = str2.substring(1, str2.length());
						int result4 = str1.indexOf(str3);
						if (result4 != -1) {
							str1 = str1.substring(0, str1.indexOf(str3));
					//		System.out.println(str1 + str2);
							return (str1 + str2);
						} else {
							str1 = str1.substring(0, str1.lastIndexOf("/") + 1);
							//System.out.println(str1 + str2);
							return (str1 + str2);
						}
					} else {
						str1 = str1.substring(0, str1.lastIndexOf("/") + 1);
						//System.out.println(str1 + str3);
						return (str1 + str3);
					}
				} else {
					int result3 = str1.indexOf(str3);
					if (result3 != -1) {
						str1 = str1.substring(0, str1.indexOf(str3));
						//System.out.println(str1 + str2);
						return (str1 + str2);
					} else {
						str1 = str1.substring(0, str1.lastIndexOf("/") + 1);
						//System.out.println(str1 + str3);
						return (str1 + str2);
					}
				}
			} else {
				String str3 = str1.substring(0, str1.lastIndexOf("/") + 1);
			//	System.out.println(str3 + str2);
				return (str1 + str2);
			}
		}
	}

}
