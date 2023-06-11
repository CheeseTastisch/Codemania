import java.io.*;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;

public class FileScanner {

    private final List<List<String>> fileData = new ArrayList<>();
    private int currentLine = -1;
    private int currentColumn = -1;

    private FileScanner(File file) {
        try {
            BufferedReader reader = new BufferedReader(new FileReader(file));
            String line;

            while ((line = reader.readLine()) != null) {
                String[] lineData = line.split(",");
                fileData.add(Arrays.asList(lineData));
            }

            reader.close();
        } catch (IOException e) {
            System.err.println("An error occurred while reading the file:");
            e.printStackTrace();
        }
    }

    /**
     * Scann the next line of the file and return it
     *
     * @return The next line of the file or null if there is no next line
     */
    public List<String> nextLine() {
        currentLine++;
        currentColumn = -1;

        if (currentLine >= fileData.size()) return null;

        return fileData.get(currentLine);
    }

    /**
     * Scann the next element of the file and return it
     *
     * @return The next element of the file or null if there is no next element
     */
    public String next() {
        currentColumn++;

        if (currentLine >= fileData.size()) return null;
        if (currentColumn >= fileData.get(currentLine).size()) return null;

        return fileData.get(currentLine).get(currentColumn);
    }

    /**
     * Scann the previous line of the file and return it
     *
     * @return The previous line of the file or null if there is no previous line
     */
    public List<String> previousLine() {
        currentLine--;
        currentColumn = -1;

        if (currentLine < 0) return null;

        return fileData.get(currentLine);
    }

    /**
     * Scann the previous element of the file and return it
     *
     * @return The previous element of the file or null if there is no previous element
     */
    public String previous() {
        currentColumn--;

        if (currentLine < 0) return null;
        if (currentColumn < 0) return null;

        return fileData.get(currentLine).get(currentColumn);
    }

    /**
     * Return the current line of the file
     *
     * @return The current line of the file or null if there is no current line
     */
    public List<String> getCurrentLine() {
        if (currentLine < 0 || currentLine >= fileData.size()) return null;

        return fileData.get(currentLine);
    }

    /**
     * Return the current element of the file
     *
     * @return The current element of the file or null if there is no current element
     */
    public String getCurrent() {
        if (currentLine < 0 || currentLine >= fileData.size()) return null;
        if (currentColumn < 0 || currentColumn >= fileData.get(currentLine).size()) return null;

        return fileData.get(currentLine).get(currentColumn);
    }

    /**
     * Check if the file has a next line
     *
     * @return True if the file has a next line, false otherwise
     */
    public boolean hasNextLine() {
        return currentLine + 1 < fileData.size();
    }

    /**
     * Check if the file has a next element
     *
     * @return True if the file has a next element, false otherwise
     */
    public boolean hasNext() {
        return currentLine < fileData.size() && currentColumn + 1 < fileData.get(currentLine).size();
    }

    /**
     * Check if the file has a previous element
     *
     * @return True if the file has a previous element, false otherwise
     */
    public boolean hasPreviousLine() {
        return currentLine > 0;
    }

    /**
     * Check if the file has a previous element
     *
     * @return True if the file has a previous element, false otherwise
     */
    public boolean hasPrevious() {
        return currentLine > 0 && currentColumn > 0;
    }

    /**
     * Create a new FileScanner from a file
     *
     * @param file The file to scan
     * @return A new FileScanner
     */
    public static FileScanner create(File file) {
        return new FileScanner(file);
    }

    /**
     * Create a new FileScanner from a file path
     *
     * @param path The path of the file to scan
     * @return A new FileScanner
     */
    public static FileScanner create(String path) {
        return new FileScanner(new File(path));
    }

}
