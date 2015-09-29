// Name/NIM    : Nicholas Posma Nasution/18213008 - Indra Nicolosi Waskita/18213041
// Date        : 29 September 2015
// Source      : WebpagesDownloader.java

import java.io.*;
import java.net.*;
import java.util.*;

import org.jsoup.Jsoup;
import org.jsoup.nodes.Document;
import org.jsoup.nodes.Element;
import org.jsoup.select.Elements;

public class WebpagesDownloader {
   public static void downloadWebpage(String link, String data) throws Exception {
      URL url = new URL(link);
      BufferedReader reader = new BufferedReader(new InputStreamReader(url.openStream()));
      BufferedWriter writer = new BufferedWriter(new FileWriter(data));

      String line;
      while((line = reader.readLine()) != null) {
         writer.write(line);
         writer.newLine();
      }
      reader.close();
      writer.close();
   }

   public static List<String> getHyperlinks(String url) {
      List<String> urls = new ArrayList<String>();
      try {
         Document doc = Jsoup.connect(url).get();
         Elements links = doc.select("a[href]");
         for(Element l : links) {
            urls.add(l.attr("abs:href"));
         }
      } catch(IOException e) {
         e.printStackTrace();
      }

      return urls;
   }

   public static void printHyperlinks(List<String> links) {
      System.out.println("Link: ");
      for(String link : links) {
         System.out.println(link);
      }
   }

   public static void main (String[] args) {
      int counter = 0;
      Scanner in = new Scanner(System.in);

      System.out.print("Target link : ");
      String target = in.nextLine();

      try {
         downloadWebpage(target, "Data.html");
         List<String> urls = getHyperlinks(target);
         printHyperlinks(urls);
         for(String url : urls) {
            try {
               downloadWebpage(url, "SubData" + counter + ".html");
               counter++;
            } catch(Exception e) {
               e.printStackTrace();
            }
         }
      } catch(Exception e) {
         e.printStackTrace();
      }
   }
}
